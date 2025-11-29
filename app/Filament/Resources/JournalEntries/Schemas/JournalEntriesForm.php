<?php

namespace App\Filament\Resources\JournalEntries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JournalEntriesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('journal_id')
                    ->label('Journal')
                    ->relationship('journal', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('date')
                    ->label('Date')
                    ->type('date')
                    ->required(),
                TextInput::make('reference_number')
                    ->label('Reference')
                    ->maxLength(255),
                TextInput::make('description')
                    ->label('Description')
                    ->maxLength(65535),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'posted' => 'Posted',
                        'voided' => 'Voided',
                    ])
                    ->required(),
            ]);
    }
}
