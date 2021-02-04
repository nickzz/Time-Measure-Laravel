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
        'BARCODE', 'LINE_NAME', 'STATION', 'MODEL', 'MODEL_NAME'
    ];
}
