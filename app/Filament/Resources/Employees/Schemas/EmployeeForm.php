<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label('First Name')
                    ->required()
                    ->maxLength(50),

                TextInput::make('last_name')
                    ->label('Last Name')
                    ->required()
                    ->maxLength(50),

                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(100),

                TextInput::make('phone')
                    ->label('Phone Number')
                    ->tel()
                    ->maxLength(15),

                Select::make('current_position_id')
                    ->label('Position')
                    ->relationship('currentPosition', 'name')
                    ->required(),

                TextInput::make('address')
                    ->label('Address')
                    ->required()
                    ->maxLength(100),

                ComponentsSection::make('Education History')
                    ->schema([
                        Repeater::make('educationHistories')
                            ->relationship('educationHistories')
                            ->schema([
                                Select::make('education_id')
                                    ->label('Education')
                                    ->relationship('education', 'school_name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->columnSpan(12),

                                TextInput::make('start_year')
                                    ->label('Start Year')
                                    ->numeric()
                                    ->minValue(1900)
                                    ->maxValue(2100)
                                    ->nullable()
                                    ->columnSpan(6),

                                TextInput::make('end_year')
                                    ->label('End Year')
                                    ->numeric()
                                    ->minValue(1900)
                                    ->maxValue(2100)
                                    ->nullable()
                                    ->columnSpan(6),

                                TextInput::make('note')
                                    ->label('Note')
                                    ->maxLength(255)
                                    ->nullable()
                                    ->columnSpan(12),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
