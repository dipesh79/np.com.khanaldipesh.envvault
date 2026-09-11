<?php

namespace App\Filament\App\Resources\Environments\Pages;

use App\Actions\ImportEnvVariable;
use App\Filament\App\Resources\Environments\EnvironmentResource;
use App\Models\Environment;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\DB;

class ViewEnvironment extends ViewRecord
{
    protected static string $resource = EnvironmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('import')
                ->label('Import')
                ->icon('heroicon-o-arrow-down-tray')
                ->schema([
                    Textarea::make('env')
                        ->helperText('Paste your environment variables here')
                        ->hint('One variable per line')
                        ->hintColor('primary')
                        ->label('Environment Variables')
                        ->rows(10)
                        ->required(),
                ])
                ->action(function ($data) {
                    DB::beginTransaction();
                    try {
                        $app = app(ImportEnvVariable::class);
                        $app->import($data['env'], $this->record);
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
                                $envString .= $variable->key . '=' . $variable->value . PHP_EOL;
                                if ($variable->gap_after) {
                                    $envString .= PHP_EOL;
                                }
                            }
                            return $envString;
                        }),
                ]),


            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
