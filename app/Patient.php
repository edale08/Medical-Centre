<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function doctors()
    {
        return $this->hasMany('App\Doctor');
    }
}
