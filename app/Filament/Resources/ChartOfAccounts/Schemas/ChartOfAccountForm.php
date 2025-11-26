<?php

namespace App\Filament\Resources\ChartOfAccounts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ChartOfAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_name')
                    ->label('Account Name')
                    ->required()
                    ->maxLength(255),
                Select::make('account_type_id')
                    ->label('Account Type')
                    ->relationship('accountType', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('account_code')
                    ->label('Account Code')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('description')
                    ->label('Description')
                    ->maxLength(65535),
            ]);
    }
}
