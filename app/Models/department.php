<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registration;

class department extends Model
{
    use HasFactory;
    public $table="department";

public function registrations()
{
    return $this->hasMany(Registration::class, 'department_id', 'id');
}


}
