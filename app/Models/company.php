<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'email',
        'address',
        'phone',
        'website',
    ];
    protected $table = 'companies';
}
