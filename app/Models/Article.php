<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'subtitle', 'body'])]
class Article extends Model
{
    // protected $fillable = [
    //     'title',
    //     'subtitle',
    //     'body'
    // ];
}
