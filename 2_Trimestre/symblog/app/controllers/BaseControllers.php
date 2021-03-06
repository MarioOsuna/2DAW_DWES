<?php

namespace App\Controllers;
use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

class BaseControllers
{
    protected $templateEngine;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->templateEngine = new \Twig\Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));
    }
    public function renderHTML($fileName, $data = [])
    {
        // return $this->templateEngine->render($fileName, $data);
        return new HtmlResponse($this->templateEngine->render($fileName, $data));
    }
}
