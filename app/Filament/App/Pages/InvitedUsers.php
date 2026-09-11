<?php

namespace App\Filament\App\Pages;

use App\Filament\App\Clusters\User\UserCluster;
use App\Models\Invitation;
use BackedEnum;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class InvitedUsers extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Envelope;

    protected static ?string $cluster = UserCluster::class;

    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.app.pages.invited-users';

    public function table(Table $table): Table
    {
        return $table
            ->searchable(['email', 'invitee.name', 'inviter.name', 'role'])
            ->query(Invitation::query()->where('invitations.organization_id', Filament::getTenant()->id))
            ->columns([
                TextColumn::make('invitee.name')
                    ->label('Invitee'),
                TextColumn::make('inviter.name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Inviter'),
                TextColumn::make('role')
                    ->label('Role')
                    ->badge()
                    ->formatStateUsing(fn($state) => ucfirst($state->value)),
                TextColumn::make('email')
                    ->label('Email')
                    ->copyable()
                    ->copyMessage('Email copied')
                    ->default('N/A'),
                TextColumn::make('expires_at')
                    ->label('Expires')
                    ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->diffForHumans() : 'N/A'),
                TextColumn::make('accepted_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Accepted')
                    ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->diffForHumans() : 'N/A'),
                TextColumn::make('rejected_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Rejected')
                    ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->diffForHumans() : 'N/A'),
            ])
            ->recordActions([
                Action::make('delete')
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->delete();

                        Notification::make('success')
                            ->title('Invitation deleted')
                            ->success()
                            ->send();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('delete')
                        ->requiresConfirmation()
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->deselectRecordsAfterCompletion()
                        ->action(function (Collection $records) {
                            $records->each->delete();
                            Notification::make('success')
                                ->title('Invitations deleted')
                                ->success()
                                ->send();
                        })
                ])

            ]);
    }
}
