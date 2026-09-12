<?php

namespace App\Filament\App\Resources\Environments\Tables;

use App\Actions\ImportEnvVariable;
use App\Models\Environment;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class EnvironmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tag')
                    ->label('Environment')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->weight('semibold')
                    ->icon('heroicon-o-server')
                    ->toggleable(),

                TextColumn::make('project.name')
                    ->label('Project')
                    ->icon('heroicon-o-briefcase')
                    ->color('primary')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('environment_values_count')
                    ->label('Environment Variables')
                    ->counts('environmentValues'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->icon('heroicon-o-calendar'),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->icon('heroicon-o-arrow-path'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('import')
                    ->label('Import')
                    ->icon('heroicon-o-arrow-path')
                    ->visible(fn ($record) => canAccessEnvironment($record))
                    ->schema([
                        Textarea::make('env')
                            ->helperText('Paste your environment variables here')
                            ->hint('One variable per line')
                            ->hintColor('primary')
                            ->label('Environment Variables')
                            ->rows(10)
                            ->required(),
                    ])
                    ->action(function ($data, Environment $record) {
                        DB::beginTransaction();
                        try {
                            $app = app(ImportEnvVariable::class);
                            $app->import($data['env'], $record);
                        } catch (\Exception $e) {
                            DB::rollBack();
                            Notification::make('error')
                                ->title('Error importing environment variables')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();

                            return;
                        }
                        DB::commit();
                        Notification::make('success')
                            ->title('Environment variables imported')
                            ->success()
                            ->send();
                    }),
                Action::make('export')
                    ->label('Export')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->modalSubmitAction(false) // no "confirm" button needed, it's just a viewer
                    ->modalCancelActionLabel('Close')
                    ->schema([
                        Textarea::make('env')
                            ->label('Environment Variables')
                            ->rows(30)
                            ->default(function (Environment $record) {
                                $environmentVariables = $record->environmentValues;
                                $envString = '';
                                foreach ($environmentVariables as $variable) {
                                    $envString .= $variable->key.'='.$variable->value.PHP_EOL;
                                    if ($variable->gap_after) {
                                        $envString .= PHP_EOL;
                                    }
                                }

                                return $envString;
                            }),
                    ]),
                ViewAction::make()
                    ->label('View')
                    ->icon('heroicon-o-eye'),
                EditAction::make()
                    ->label('Edit')
                    ->visible(fn ($record) => canAccessEnvironment($record))
                    ->icon('heroicon-o-pencil-square'),
                DeleteAction::make()
                    ->visible(fn ($record) => canAccessEnvironment($record))
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Delete Selected')
                        ->icon('heroicon-o-trash')
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->searchPlaceholder('Search environments...')
            ->emptyStateHeading('No environments found')
            ->emptyStateDescription('Create a new environment to get started.')
            ->emptyStateIcon('heroicon-o-server')
            ->poll('60s');
    }
}
