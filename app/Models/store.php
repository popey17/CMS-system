<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location_id',
        'note',
        'address',
        'phone',
    ];

    protected $table = 'stores';

    public function location()
    {
        return $this->belongsTo(location::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
    
    public function customer ()
    {
        return $this->hasMany(customer::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_stores', 'store_id');
    }

    public function sale()
    {
        return $this->hasMany(sale::class);
    }
}
