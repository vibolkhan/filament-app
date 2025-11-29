<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntries extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function journal()
    {
        return $this->belongsTo(Journals::class);
    }
}
