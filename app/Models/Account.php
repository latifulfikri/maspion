<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    
    protected $table = 'account';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'pass',
        'name',
        'joe',
        'gender',
        'pict',
        'role_id',
        'token'
    ];

    protected $hidden = [
        'id',
        'pass',
        'token',
        'role_id',
    ];
}
