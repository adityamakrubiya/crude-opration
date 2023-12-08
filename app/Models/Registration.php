<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\department;

class Registration extends Model
{
    use HasFactory;
    public $table="registration";
    
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
