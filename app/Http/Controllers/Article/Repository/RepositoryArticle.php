<?php

namespace App\Http\Controllers\Article\Repository;

/**
 * repository interface
 */
use App\Http\Controllers\Article\Repository\Interface\IRepositoryArticle;

/**
 * models
 */
use App\Models\Article;

class RepositoryArticle implements IRepositoryArticle
{
    /**
     * add article
     * @params
     * array $data
     *
     * @return
     * object
     */
    public function addArticle(
        array $data
    ) : object{
        return Article::create($data);
    }

    /**
     * get article record
     * @params
     * array $where
     *
     * @return
     * object | null
     */
    public function getArticle(
        array $where
    ) : object | null{
        return Article::where($where);
    }

    /**
     * update article
     * @params
     * int $article_id,
     * array $data
     *
     * @return
     * int | bool
     */
    public function updateArticle(
        int $article_id,
        array $data
    ) : int | bool{
        return Article::where('id', $article_id)
        ->update($data);
    }

    /**
     * delete article
     * @params
     * int $article_id
     *
     * @return
     * int | bool
     */
    public function deleteArticle(
        int $article_id
    ) : int | bool{
        return Article::where('id', $article_id)->delete();
    }
}
