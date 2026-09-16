<?php

namespace App\Filament\App\Pages;

use App\Enums\OrganizationUserRole;
use App\Filament\App\Clusters\User\UserCluster;
use App\Models\Invitation;
use App\Models\OrganizationUser;
use App\Models\Team;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Users extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|null|\BackedEnum $navigationIcon = Heroicon::Users;

    protected static ?string $cluster = UserCluster::class;

    protected string $view = 'filament.app.pages.users';

    protected ?string $subheading = 'Manage users';

    public static function canAccess(): bool
    {
        return canAccessOrganization();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(OrganizationUser::query()->where('organization_user.organization_id', Filament::getTenant()->id))
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('role')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->badge()
                    ->label('Role'),
                TextColumn::make('created_at')
                    ->label('Joined At')
                    ->dateTime('M d, Y'),
            ])
            ->recordActions([
                Action::make('update_role')
                    ->label('Update Role')
                    ->icon('heroicon-o-pencil-square')
                    ->color('primary')
                    ->hidden(fn ($record) => $record->organization->owner_id === $record->user_id)
                    ->schema([
                        Select::make('role')
                            ->options(OrganizationUserRole::class)
                            ->searchable()
                            ->preload()
                            ->default(fn ($record) => $record->role),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update(['role' => $data['role']]);
                        Notification::make('success')
                            ->title('Role updated')
                            ->success()
                            ->send();
                    }),
                Action::make('delete')
                    ->label('Remove From Organization')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->hidden(fn ($record) => $record->organization->owner_id === $record->user_id)
                    ->action(function ($record) {
                        $record->delete();
                        $record->organization->users()->detach($record->user_id);

                        $teams = Team::where('organization_id', $record->organization_id)->get();
                        foreach ($teams as $team) {
                            $team->users()->detach($record->user_id);
                        }

                        Notification::make('success')
                            ->title('User removed from organization')
                            ->success()
                            ->send();
                    }),
                Action::make('tranfer_ownership')
                    ->label('Transfer Ownership')
                    ->requiresConfirmation()
                    ->color('warning')
                    ->icon('heroicon-o-arrow-right-on-rectangle')
                    ->hidden(fn ($record) => $record->organization->owner_id === $record->user_id)
                    ->visible(fn ($record) => $record->organization->owner_id === auth()->id())
                    ->action(function ($record) {
                        $record->organization->update(['owner_id' => $record->user_id]);
                        $record->update(['role' => OrganizationUserRole::OWNER->value]);
                        Notification::make('success')
                            ->title('Ownership transferred')
                            ->success()
                            ->send();
                    }),

            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('invite_user')
                ->icon('heroicon-o-user-plus')
                ->label('Invite User')
                ->schema([
                    Select::make('role')
                        ->options(OrganizationUserRole::class)
                        ->searchable()
                        ->preload(),
                    Hidden::make('organization_id')
                        ->default(Filament::getTenant()->id),
                    Toggle::make('existing_user')
                        ->label('Existing User')
                        ->default(true)
                        ->live()
                        ->hint('Check this if the user is already a member of the organization.'),
                    Select::make('user_id')
                        ->label('User')
                        ->required(fn ($get) => $get('existing_user'))
                        ->hidden(fn ($get) => ! $get('existing_user'))
                        ->options(function () {
                            $users = User::all()->pluck('email', 'id')->toArray();
                            $existingUsers = OrganizationUser::where('organization_id',
                                Filament::getTenant()->id)->pluck('user_id')->toArray();

                            return array_diff_key($users, array_flip($existingUsers));
                        })
                        ->searchable(),
                    TextInput::make('email')
                        ->label('Email')
                        ->required(fn ($get) => ! $get('existing_user'))
                        ->hidden(fn ($get) => $get('existing_user'))
                        ->hint('This will be the email address of the user that will be invited.')
                        ->hintColor('primary'),

                ])->action(function (array $data) {
                    try {
                        DB::beginTransaction();
                        $inviteData = [
                            'organization_id' => $data['organization_id'],
                            'inviter_id' => auth()->id(),
                            'role' => $data['role'],
                            'token' => Str::random(60),
                            'expires_at' => now()->addDays(7),
                        ];
                        if ($data['existing_user']) {
                            $inviteData['invitee_id'] = $data['user_id'];
                        } else {
                            $inviteData['email'] = $data['email'];
                        }
                        Invitation::create($inviteData);

                    } catch (\Exception $e) {
                        DB::rollBack();
                        Notification::make('error')
                            ->title('Error Inviting User')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();

                        return;
                    }
                    DB::commit();
                    Notification::make('success')
                        ->title('User Invitation Sent')
                        ->success()
                        ->send();
                }),
        ];
    }
}
