<?php


namespace App\Controllers;


class AdminController extends BaseControllers
{
    public function getIndex(){
        return $this->renderHTML('admin.twig');
    }
    
}
