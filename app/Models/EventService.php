<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventService extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function event()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function services()
    {
        return $this->hasOne('App\Models\Service', 'service_id');
    }
}
