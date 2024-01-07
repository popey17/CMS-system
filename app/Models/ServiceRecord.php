<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'service_record_id',
        'service_id',
        'customer_id',
        'height',
        'weight',
        'bmi',
        'note',
        'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
