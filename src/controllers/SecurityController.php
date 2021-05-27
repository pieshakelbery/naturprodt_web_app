<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function login() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->login('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user) {
            return $this->render('login', ['messages'=>'User not exist!']);
        }

        if($user->getEmail() !== $email){
            return $this->render('login', ['messages'=>'User with this email not exist!']);
        }
        if($user->getPassword() !== md5($password)){
            return $this->render('login', ['messages'=>'Incorrect password!']);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/products");
    }

    public function logout(){
        //logout button in user settings
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/products");
    }
}