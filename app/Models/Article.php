<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'subtitle', 'body', 'cover'])]
class Article extends Model
{
    // protected $fillable = [
    //     'title',
    //     'subtitle',
    //     'body'
    // ];
}
