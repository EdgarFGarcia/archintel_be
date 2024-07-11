<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * service concrete class
 */
use App\Http\Controllers\Article\Service\ServiceArticle;

/**
 * validtion
 */
use App\Http\Controllers\Article\Validation\AddArticle;
use App\Http\Controllers\Article\Validation\EditArticle;

class ArticleController extends Controller
{

    /**
     * class properties
     */
    protected $service_article;

    /**
     * DIP
     * @App\Http\Controllers\Article\Service\ServiceArticle
     */
    function __construct(
        ServiceArticle $service_article
    ){
        $this->service_article = $service_article;
    }

    /**
     * add an article
     * @params
     * Request $request
     *
     * validation inject
     * @App\Http\Controllers\Article\Validation\AddArticle
     *
     * @return
     * object | bool
     */
    public function addArticle(
        AddArticle $request
    ){
        try{
            // return $request->validated();
            $add_article = $this->service_article->addArticle($request->validated());
            if($add_article){
                return response()->json([
                    'response'  => true,
                    'message'   => "adding an article, successful!"
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => "There's an error! Or you are an editor, this feature is for writers only!"
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * get all articles
     * @params
     * none
     *
     * @return
     * object | array
     */
    public function getArticles() : object | array{
        try{
            $article = $this->service_article->getArticle(null);
            if($article){
                return response()->json([
                    'response'  => true,
                    // 'data'      => $article,
                    'for_edit'  => $article['for_edit'],
                    'published' => $article['published']
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'data'      => []
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * only for `for edit` article status
     * @params
     * Request $request,
     * int $article_id
     *
     * @validation
     * -App\Http\Controllers\Article\Validation\EditArticle
     * @return
     * object | bool
     */
    public function forEdit(
        EditArticle $request,
        int $article_id
    ) : object | bool | array{
        try{
            $update_record = $this->service_article->editForEdit($request->validated(), $article_id);
            if($update_record){
                return response()->json([
                    'response'  => true,
                    'message'   => 'updating record, successful!'
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => 'something went wrong!'
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * save and publish an article
     * @params
     * Request $request,
     * int $article_id
     *
     * validation inject
     * @App\Http\Controllers\Article\Validation\EditArticle
     *
     * @return
     * object | array
     */
    public function publish(
        EditArticle $request,
        int $article_id
    ) : object | array{
        try{
            $update_record = $this->service_article->editForEdit($request->validated(), $article_id);
            if($update_record){
                return response()->json([
                    'response'  => true,
                    'message'   => 'updating record, successful!'
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => 'something went wrong!'
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * save an article but don't publish
     * @params
     * Request $request,
     * int $article_id
     *
     * validation inject
     * @App\Http\Controllers\Article\Validation\EditArticle
     *
     * @return
     * object | array
     */
    public function save(
        EditArticle $request,
        int $article_id
    ) : object | array{
        try{
            $update_record = $this->service_article->editForEdit($request->validated(), $article_id);
            if($update_record){
                return response()->json([
                    'response'  => true,
                    'message'   => 'updating record, successful!'
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => 'something went wrong!'
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }
}
