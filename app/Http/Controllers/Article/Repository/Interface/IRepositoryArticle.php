<?php

namespace App\Http\Controllers\Article\Repository\Interface;

interface IRepositoryArticle
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
    ) : object;

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
    ) : object | null;

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
    ) : int | bool;

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
    ) : int | bool;
}
