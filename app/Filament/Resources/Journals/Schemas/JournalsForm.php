<?php

namespace App\Filament\Resources\Journals\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JournalsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Code')
                    ->required()
                    ->unique(table: 'journals', column: 'code', ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label('Type')
                    ->required()
                    ->options([
                        'sale' => 'Sale',
                        'purchase' => 'Purchase',
                        'bank' => 'Bank',
                        'cash' => 'Cash',
                        'general' => 'General',
                    ]),
                Select::make('debit_account_id')
                    ->label('Default Debit Account')
                    ->relationship('debitAccount', 'name')
                    ->nullable(),
                Select::make('credit_account_id')
                    ->relationship('creditAccount', 'name')
                    ->label('Default Credit Account')
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
