<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEducationHistories extends Model
{
    protected $table = 'employee_education_histories';

    use HasFactory;
    protected $guarded = [];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
