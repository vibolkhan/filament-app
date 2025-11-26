<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function accountType()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }
}
