<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'Staff';
    public $timestamps = false;

    protected $fillable = [
        'EmpNo', 'EmpName', 'Company', 'Division', 'Department'
    ];

}
