<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{

    protected $table = 'workers';
    protected $primaryKey = 'empNo';
    public $incrementing = false;
    public $keyType = 'string';


    protected $fillable = [
        'empNo', 'empName', 'company', 'division', 'department'
    ];
}
