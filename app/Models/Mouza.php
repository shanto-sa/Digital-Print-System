<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouza extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'name', 'status', 'created_by'];



    //return the location this mouza belongs to
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    //return the user who created this mouza
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
