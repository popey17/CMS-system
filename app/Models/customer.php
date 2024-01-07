<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function serviceRecord()
    {
        return $this->hasMany(servicerecord::class);
    }

    public function sale()
    {
        return $this->hasMany(sale::class);
    }
}
