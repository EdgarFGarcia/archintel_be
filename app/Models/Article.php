<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * table
     */
    protected $table = "articles";

    /**
     * fillable
     */
    protected $fillable = [
        'image',
        'title',
        'link',
        'date_created',
        'content',
        'article_status_id',
        'writer_id',
        'editor_id',
        'company_id'
    ];

    /**
     * casts
     */
    protected $casts = [
        // 'date_created' => 'datetime:M d, Y h:i a'
    ];

    public function getArticleStatus() : HasOne{
        return $this->hasOne(ArticleStatus::class, 'id', 'article_status_id');
    }

    public function getWriter() : HasOne{
        return $this->hasOne(User::class, 'id', 'writer_id');
    }

    public function getEditor() : HasOne{
        return $this->hasOne(User::class, 'id', 'editor_id');
    }

    public function getCompany() : HasOne{
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
