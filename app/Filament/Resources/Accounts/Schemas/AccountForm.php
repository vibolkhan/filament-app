<?php

namespace App\Filament\Resources\Accounts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Code')
                    ->required()
                    ->unique(table: 'accounts', column: 'code', ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('type')
                    ->label('Type')
                    ->required()
                    ->maxLength(255),
                TextInput::make('parent_id')
                    ->label('Parent Account')
                    ->nullable(),
                Select::make('currency_id')
                    ->label('Currency')
                    ->relationship('currencies', 'name')
                    ->nullable(),
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->default(true),
            ]);
    }
}
