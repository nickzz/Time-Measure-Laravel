<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
    protected $table = 'Staff';
    protected $primaryKey = 'EmpNo';
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';


    protected $fillable = [
        'EmpNo', 'EmpName', 'Company', 'Division', 'Department'
    ];

}
