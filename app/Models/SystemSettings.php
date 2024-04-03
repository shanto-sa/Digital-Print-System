<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_format',
        'time_zone',
        'currency_code',
        'currency_symbol',
        'currency',
        'currency_position'
    ];
}
