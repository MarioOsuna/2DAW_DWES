<?php


namespace App\Controllers;

use App\Models\Users;
use Respect\Validation\Validator as v;
use Laminas\Diactoros\ServerRequest; 

class UsersController extends BaseControllers
{
    public function getAddUserAction($request)
    {

        $responseMessage = null;

        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $userValidator = v::key('email', v::stringType()->notEmpty())
                ->key('password', v::stringType()->notEmpty());
            try {
                $userValidator->assert($postData);
                $user = new Users();
                $user->email = $postData['email'];
                // $user->password = $postData['password'];
                $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $user->name = $postData['nombre'];

                $files = $request->getUploadedFiles();
                $image = $files['image'];
                if ($image->getError() == UPLOAD_ERR_OK) {
                    $fileName = $image->getClientFilename();
                    $fileName = uniqid() . $fileName;
                    $image->moveTo("./img/$fileName");
                    $user->image = $fileName;
                }
               
                $user->save();
                $responseMessage = "Usuario registrado";
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();

            }
        }

        return $this->renderHTML('registrar.twig', [
            'responseMessage' => $responseMessage]);
        // include '..\views\addBlog.php';


        /*    var_dump((string)$request->getBody());
        var_dump($request->getMethod());
        var_dump($request->getParsedBody());

        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $blog = new Blog();
            $blog->title = $postData['title'];
            $blog->blog = $postData['description'];
            $blog->tags = $postData['tag'];
            $blog->author = $postData['author'];
           $files=$request->getUploadedFiles();
           $image=$files['image'];
           if($image->getError()==UPLOAD_ERR_OK){
               $fileName=$image->getClientFilename();
               $fileName=uniqid().$fileName;
               $image->moveTo("./img/$fileName");
               $blog->image=$fileName;
           }
           
            $blog->save();
        }
        return $this->renderHTML('addBlog.twig',array('mensaje'=>'Hola mundo')); */
    }
}
