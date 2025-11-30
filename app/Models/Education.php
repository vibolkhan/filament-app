<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'educations';

    public function employeeHistories()
    {
        return $this->hasMany(EmployeeEducationHistories::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_education_histories')
            ->withPivot(['start_year', 'end_year', 'note'])
            ->withTimestamps();
    }
}
