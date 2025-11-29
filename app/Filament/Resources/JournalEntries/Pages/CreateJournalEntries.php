<?php

namespace App\Filament\Resources\JournalEntries\Pages;

use App\Filament\Resources\JournalEntries\JournalEntriesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJournalEntries extends CreateRecord
{
    protected static string $resource = JournalEntriesResource::class;
}
