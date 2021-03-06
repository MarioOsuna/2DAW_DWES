<?php


namespace App\Controllers;

use App\Models\Users;
use Respect\Validation\Validator as v;
use Laminas\Diactoros\Response\RedirectResponse; 

class AuthController extends BaseControllers
{
    public function getLogin(){
        return $this->renderHTML('login.twig');
    }
    public function postLogin($request)
    {
        $postData=$request->getParsedBody();
        $responseMessage = null;

        $user=Users::where('email',$postData['email'])->first();

        if($user){

            if(password_verify($postData['password'],$user->password)){
                
                $_SESSION['userId']=$user->email;
                $responseMessage='Ok credentials';
                return new RedirectResponse('/symblog/users/admin');
               
                 //$responseMessage='Ok credentials';
            }else{
                
                $responseMessage='Bad credentials';
            }
        }else{

            $responseMessage='Bad credentials';
        }

        return $this->renderHTML('login.twig', [
            'responseMessage' => $responseMessage]);
       
    }
    public function getLogout(){
        unset($_SESSION['userId']);
        return new RedirectResponse('/symblog/users/login');
    }
}
