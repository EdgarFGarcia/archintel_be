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
                'message'   => "There's an error!"
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }
}
