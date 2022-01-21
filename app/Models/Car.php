<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Car extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    // use SoftDeletingTrait;
    protected $table ='cars';

    // protected $hidden = [
    //  'password', 
    // ];
    // public function getAuthPassword()
    // {
    //  return $this->password;
    // }

    protected $fillable = [
        'noplate',
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
