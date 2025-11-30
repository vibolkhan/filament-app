<?php

namespace App\Filament\Resources\Histories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HistoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.name')
                    ->state(fn ($record) => $record->employee->first_name . ' ' . $record->employee->last_name)
                    ->label('Employee')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('position.name')->label('Position')->sortable()->searchable(),
                TextColumn::make('start_date')->label('Start Date')->date()->sortable()->searchable(),
                TextColumn::make('end_date')->label('End Date')->date()->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
