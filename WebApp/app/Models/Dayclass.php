<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dayclass extends Model
{
    protected $table = 'dayclass';

    protected $fillable = [        
        'horaireID',
        'name',
        'teacher',
        'room',
        'startingTime',
        'endingTime',
        'suffix'
    ];
    
    
    protected $dates = [
        'startingTime',
        'endingTime',
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/dayclasses/'.$this->getKey());
    }
}
