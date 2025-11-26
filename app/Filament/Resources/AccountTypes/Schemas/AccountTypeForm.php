<?php

namespace App\Filament\Resources\AccountTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AccountTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('code')
                    ->label('Code')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(100),
                TextInput::make('category')
                    ->label('Category')
                    ->required()
                    ->maxLength(100),
                TextInput::make('normal_balance')
                    ->label('Normal Balance')
                    ->required()
                    ->maxLength(50),
                TextInput::make('description')
                    ->label('Description')
                    ->maxLength(65535),
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
