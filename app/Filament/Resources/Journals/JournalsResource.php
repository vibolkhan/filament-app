<?php

namespace App\Filament\Resources\Journals;

use App\Filament\Resources\Journals\Pages\CreateJournals;
use App\Filament\Resources\Journals\Pages\EditJournals;
use App\Filament\Resources\Journals\Pages\ListJournals;
use App\Filament\Resources\Journals\Pages\ViewJournals;
use App\Filament\Resources\Journals\Schemas\JournalsForm;
use App\Filament\Resources\Journals\Schemas\JournalsInfolist;
use App\Filament\Resources\Journals\Tables\JournalsTable;
use App\Models\Journals;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class JournalsResource extends Resource
{
    protected static ?string $model = Journals::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-book-open';
    protected static string|UnitEnum|null $navigationGroup = 'Accounting';

    protected static ?string $recordTitleAttribute = 'Journals';

    public static function form(Schema $schema): Schema
    {
        return JournalsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JournalsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JournalsTable::configure($table);
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
            'index' => ListJournals::route('/'),
            'create' => CreateJournals::route('/create'),
            'view' => ViewJournals::route('/{record}'),
            'edit' => EditJournals::route('/{record}/edit'),
        ];
    }
}
