<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeDisabled($query)
    {
        return $query->where('status', 0);
    }
}
