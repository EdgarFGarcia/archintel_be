<?php

namespace App\Http\Controllers\Article\Service;

/**
 * laravel facade
 */
use Illuminate\Support\Facades\Auth;

/**
 * service interface
 */
use App\Http\Controllers\Article\Service\Interface\IServiceArticle;

/**
 * repository concrete class
 */
use App\Http\Controllers\Article\Repository\RepositoryArticle;

class ServiceArticle implements IServiceArticle
{
    /**
     * class properties
     */
    protected $repo_article;

    /**
     * DIP
     * @App\Http\Controllers\Article\Repository\RepositoryArticle
     */
    function __construct(
        RepositoryArticle $repo_article
    ){
        $this->repo_article = $repo_article;
    }

    /**
     * add article
     * @params
     * array $data
     *
     * @return
     * object | bool
     */
    public function addArticle(
        array $data
    ) : object | bool{
        if(Auth::user()->user_type_id == 2){
            /**
             * as a writer continue to add an article with article status set to `For Edit (1)`
             */
            $data['article_status_id'] = 1;
            $data['writer_id'] = Auth::user()->id;
            return $this->repo_article->addArticle($data);
        }
        return false;
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
        array $where = null
    ) : object | null | array{
        if(is_null($where)){
            $for_edit = $this->repo_article->getArticle([])
            ->with('getArticleStatus', 'getWriter', 'getEditor', 'getCompany')
            ->where('article_status_id', 1)
            ->get();

            $published = $this->repo_article->getArticle([])
            ->with('getArticleStatus', 'getWriter', 'getEditor', 'getCompany')
            ->where('article_status_id', 2)
            ->get();

            return [
                "for_edit" => $for_edit,
                "published" => $published
            ];
        }
        return $this->repo_article->getArticle($where)
            ->with('getArticleStatus', 'getWriter', 'getEditor', 'getCompany')
            ->first();
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
        return $this->repo_article->updateArticle($article_id, $data);
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
        return $this->repo_article->deleteArticle($article_id);
    }

    /**
     * non interfaced behaviors
     */
    public function editForEdit(
        array $data,
        int $article_id
    ) : int | bool {
        if($data['article_status_id'] == 1){
            $data['writer_id'] = Auth::user()->id;
            $data['date_created'] = date('Y-m-d');
            return $this->updateArticle($article_id, $data);
        }
        if($data['article_status_id'] == 2){
            $data['editor_id'] = Auth::user()->id;
            $data['date_created'] = date('Y-m-d');
            return $this->updateArticle($article_id, $data);
        }
        return false;
    }
}
