<?php

namespace App\Models;

use App\Models\Vacance;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    protected $fillable = ['name', 'email' , 'image', 'phone' , 'department_id'];

    public function vacances()
    {
        return $this->hasMany(Vacance::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    use HasFactory;
}
