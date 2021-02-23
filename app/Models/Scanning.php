<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanning extends Model
{
    protected $table = 'Scannings';
    public $timestamps = false;

    // protected $primaryKey = 'empNo';
    // public $incrementing = false;
    // public $keyType = 'string';


    protected $fillable = [
        'BARCODE', 'STATION', 'START_TIME','END_TIME','EMP_NO','START_REST_TIME','END_REST_TIME'
    ];
}
