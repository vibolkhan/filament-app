<?php

namespace App\Filament\Resources\Positions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PositionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Position Title')
                    ->required()
                    ->maxLength(100),
                TextInput::make('department')
                    ->label('Department')
                    ->required()
                    ->maxLength(100),
                TextInput::make('description')
                    ->label('Description')
                    ->required()
                    ->maxLength(100),
            ]);
    }
}
