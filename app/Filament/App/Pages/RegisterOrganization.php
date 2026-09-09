<?php

namespace App\Filament\App\Pages;

use App\Enums\OrganizationUserRole;
use App\Models\Organization;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class RegisterOrganization extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Organization';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Organization Details')
                    ->description('Basic information about the organization')
                    ->icon('heroicon-o-building-office-2')
                    ->schema([
                        TextInput::make('name')
                            ->label('Organization Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Acme Corporation')
                            ->columnSpan(1),
                    ]),
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        $organization = Organization::create([
            'name' => $data['name'],
            'owner_id' => auth()->id(),
        ]);

        $organization->users()->attach(auth()->id(), ['role' => OrganizationUserRole::OWNER->value]);

        return $organization;
    }

    protected function getFormActions(): array
    {
        return [
            ...parent::getFormActions(),
            Action::make('back')
                ->label('Back')
                ->url('/app')
        ];
    }
}
