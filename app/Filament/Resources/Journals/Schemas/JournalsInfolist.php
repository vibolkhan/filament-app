<?php

namespace App\Filament\Resources\Journals\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class JournalsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextColumn::make('code')
                    ->label('Code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Is Active')
                    ->boolean()
                    ->sortable(),
            ]);
    }
}
