<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'created_by'];

    
    //return the user who created this location
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
