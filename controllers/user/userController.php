<?php 

class HomeUserController{
    
    public function homeUser(){
        require_once './views/user/home/home.php';
    }

    public function homeIntro(){
        require_once './views/user/intro/intro.php';
    }

    public function homeNew(){
        require_once './views/user/news/news.php';
    }
    public function homeLogin(){
        require_once './views/user/login/login.php';
    }
}