<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'id';

    protected $fillable = [
        'account_id',
        'date',
        'title',
        'desc',
        'pict',
        'like',
        'share',
        'reported',
        'category_id',
    ];

    protected $hidden = [
        'category_id',
        'account_id',
    ];
}
