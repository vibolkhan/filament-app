<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journals extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function currencies()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function debitAccount()
    {
        return $this->belongsTo(Account::class, 'debit_account_id');
    }

    public function creditAccount()
    {
        return $this->belongsTo(Account::class, 'credit_account_id');
    }

    public function journalEntries()
    {
        return $this->hasMany(JournalEntries::class);
    }
}
