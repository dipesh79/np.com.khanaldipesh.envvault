<?php

namespace App\Filament\App\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Project')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->icon('heroicon-o-briefcase')
                    ->toggleable(),

                TextColumn::make('owner.name')
                    ->label('Owner')
                    ->icon('heroicon-o-user')
                    ->color('primary')
                    ->toggleable(),

                TextColumn::make('teams_count')
                    ->counts('teams')
                    ->label('Teams')
                    ->icon('heroicon-o-user-group')
                    ->color('primary')
                    ->toggleable(),

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
                ViewAction::make()
                    ->label('View')
                    ->icon('heroicon-o-eye'),
                EditAction::make()
                    ->label('Edit')
                    ->visible(canAccessOrganization())
                    ->icon('heroicon-o-pencil-square'),
                DeleteAction::make()
                    ->label('Delete')
                    ->visible(canAccessOrganization())
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(canAccessOrganization())
                        ->label('Delete Selected')
                        ->icon('heroicon-o-trash')
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->searchPlaceholder('Search projects...')
            ->emptyStateHeading('No projects found')
            ->emptyStateDescription('Create a new project to get started.')
            ->emptyStateIcon('heroicon-o-briefcase')
            ->poll('60s');
    }
}
