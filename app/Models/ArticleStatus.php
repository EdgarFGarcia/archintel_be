<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleStatus extends Model
{
    use HasFactory;

    /**
     * table
     */
    protected $table = "article_statuses";

    /**
     * fillable
     */
    protected $fillable = [
        'name'
    ];
}
