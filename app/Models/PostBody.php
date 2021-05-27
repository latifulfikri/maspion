<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBody extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'post_body';
    protected $primaryKey = 'id';

    protected $fillable = [
        'post_id',
        'pict',
        'sub_title',
        'body',
    ];
}
