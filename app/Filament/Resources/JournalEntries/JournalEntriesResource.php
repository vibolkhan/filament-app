<?php

namespace App\Filament\Resources\JournalEntries;

use App\Filament\Resources\JournalEntries\Pages\CreateJournalEntries;
use App\Filament\Resources\JournalEntries\Pages\EditJournalEntries;
use App\Filament\Resources\JournalEntries\Pages\ListJournalEntries;
use App\Filament\Resources\JournalEntries\Pages\ViewJournalEntries;
use App\Filament\Resources\JournalEntries\Schemas\JournalEntriesForm;
use App\Filament\Resources\JournalEntries\Schemas\JournalEntriesInfolist;
use App\Filament\Resources\JournalEntries\Tables\JournalEntriesTable;
use App\Models\JournalEntries;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class JournalEntriesResource extends Resource
{
    protected static ?string $model = JournalEntries::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-clipboard-document';
    protected static string|UnitEnum|null $navigationGroup = 'Accounting';

    protected static ?string $recordTitleAttribute = 'JournalEntries';

    public static function form(Schema $schema): Schema
    {
        return JournalEntriesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JournalEntriesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JournalEntriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJournalEntries::route('/'),
            'create' => CreateJournalEntries::route('/create'),
            'view' => ViewJournalEntries::route('/{record}'),
            'edit' => EditJournalEntries::route('/{record}/edit'),
        ];
    }
}
