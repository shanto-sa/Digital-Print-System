<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dag extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'mouza_id', 'new_mouza_id',  'map_type', 'jalno', 'dag_no', 'map_image', 'sit_no', 'status', 'created_by'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function mouza()
    {
        return $this->belongsTo(Mouza::class, 'mouza_id');
    }


    public function newmouza()
    {
        return $this->belongsTo(MouzaNew::class, 'new_mouza_id');
    }


    //return the user who created this dag
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
