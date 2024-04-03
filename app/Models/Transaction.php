<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'mouza_id',
        'new_mouza_id',
        'dag_id',
        'map_type',
        'jalno',
        'dag_no',
        'sit_no',
        'status',
        'email',
        'created_by'
    ];


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

    public function dag()
    {
        return $this->belongsTo(Dag::class, 'dag_id');
    }


    //return the user who created this dag
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
