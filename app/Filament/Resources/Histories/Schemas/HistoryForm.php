<?php

namespace App\Filament\Resources\Histories\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('employee_name')
                    ->label('Employee Name')
                    ->state(fn($record) => $record->employee->first_name . ' ' . $record->employee->last_name)
                    ->required()
                    ->maxLength(100),
                TextInput::make('position')
                    ->label('Position')
                    ->required()
                    ->maxLength(100),
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required()
                    ->date(),
                DatePicker::make('end_date')
                    ->label('End Date')
                    ->nullable()
                    ->date(),
            ]);
    }
}
