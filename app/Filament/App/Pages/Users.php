<?php

namespace App\Filament\App\Pages;

use App\Enums\OrganizationUserRole;
use App\Models\OrganizationUser;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Users extends Page implements HasTable
{
    use  InteractsWithTable;

    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-users';
    protected string $view = 'filament.app.pages.users';
    protected ?string $subheading = 'Manage users';

    public function table(Table $table): Table
    {
        return $table
            ->query(OrganizationUser::query())
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('role')
                    ->formatStateUsing(fn($state) => ucfirst($state))
                    ->badge()
                    ->label('Role'),
                TextColumn::make('created_at')
                    ->label('Joined At')
                    ->dateTime('M d, Y')
            ])
            ->recordActions([
                Action::make('update_role')
                    ->label('Update Role')
                    ->icon('heroicon-o-pencil-square')
                    ->color('primary')
                    ->hidden(fn($record) => $record->organization->owner_id === $record->user_id)
                    ->schema([
                        Select::make('role')
                            ->options(OrganizationUserRole::class)
                            ->searchable()
                            ->preload()
                            ->default(fn($record) => $record->role)
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
                    ->hidden(fn($record) => $record->organization->owner_id === $record->user_id)
                    ->action(function ($record) {
                        $record->delete();
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
                    ->hidden(fn($record) => $record->organization->owner_id === $record->user_id)
                    ->action(function ($record) {
                        $record->organization->update(['owner_id' => $record->user_id]);
                        $record->update(['role' => OrganizationUserRole::OWNER->value]);
                        Notification::make('success')
                            ->title('Ownership transferred')
                            ->success()
                            ->send();
                    })

            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('add_user')
                ->color('success')
                ->icon('heroicon-o-user-plus')
                ->label('Add User')
                ->schema([
                    Select::make('role')
                        ->options(OrganizationUserRole::class)
                        ->searchable()
                        ->preload(),
                    Hidden::make('organization_id')
                        ->default(Filament::getTenant()->id),
                    Select::make('user_id')
                        ->label('User')
                        ->options(function () {
                            $users = User::all()->pluck('email', 'id')->toArray();
                            $existingUsers = OrganizationUser::where('organization_id',
                                Filament::getTenant()->id)->pluck('user_id')->toArray();
                            return array_diff_key($users, array_flip($existingUsers));
                        })
                        ->searchable()
                ])->action(function (array $data) {
                    OrganizationUser::create([
                        'user_id' => $data['user_id'],
                        'organization_id' => Filament::getTenant()->id,
                        'role' => $data['role'],
                    ]);

                    Notification::make('success')
                        ->title('User added to organization')
                        ->success()
                        ->send();
                }),
        ];
    }

}
