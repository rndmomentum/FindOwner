<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens;

class Car extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    use HasApiTokens;

    protected $table ='cars';

    // protected $guarded = []; 

    protected $fillable = [
        'noplate',
        'ic',
        'description',
        'type',
        'staffname',
        'department',
        'unit',
        'nophone',
        'password',
        'img_path',
        'refer_id'
    ];

    protected $dates = ['deleted_at'];
}
