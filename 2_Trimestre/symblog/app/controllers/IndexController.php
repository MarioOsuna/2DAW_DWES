<?php
namespace App\Controllers;
use App\Models\Blog;
use App\Models\Comment;
use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

class IndexController extends BaseControllers{

    public function indexAction(){
        // echo 'IndexAction';
        $blogs=Blog::all();
        $comments=Comment::all();
        // $comments=Comment::all();
        // include '..\views\index.php';

        return $this->renderHTML('index.twig',[
            'blogs'=>$blogs,
            'comments'=>$comments
            ]);


    }
}
