<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaignhit extends Model
{
    protected $fillable = [
        'campaignid', 'gpslat', 'gpslng', 'browser', 'location'
    ];
}
