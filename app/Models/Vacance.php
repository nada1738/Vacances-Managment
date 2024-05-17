<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacance extends Model
{
    protected $fillable = ['employee_id', 'start_date', 'end_date', 'reason'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    use HasFactory;
}
