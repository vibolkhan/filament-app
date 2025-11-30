<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'employees';


    public function histories()
    {
        return $this->hasMany(History::class);
    }
    public function currentPosition()
    {
        return $this->belongsTo(Position::class, 'current_position_id');
    }

    public function positionHistories()
    {
        return $this->hasMany(History::class);
    }

    public function educationHistories()
    {
        return $this->hasMany(EmployeeEducationHistories::class);
    }

    public function educations()
    {
        return $this->belongsToMany(Education::class, 'employee_education_histories')
            ->withPivot(['start_year', 'end_year', 'note'])
            ->withTimestamps();
    }

    protected static function booted(): void
    {
        static::created(function (Employee $employee) {
            if ($employee->current_position_id) {
                History::create([
                    'employee_id' => $employee->id,
                    'position_id' => $employee->current_position_id,
                    'start_date'  => now(),
                ]);
            }
        });

        static::updated(function (Employee $employee) {
            if ($employee->wasChanged('current_position_id')) {

                // Close previous open history
                History::where('employee_id', $employee->id)
                    ->whereNull('end_date')
                    ->update(['end_date' => now()]);

                if ($employee->current_position_id) {
                    History::create([
                        'employee_id' => $employee->id,
                        'position_id' => $employee->current_position_id,
                        'start_date'  => now(),
                    ]);
                }
            }
        });
    }
}
