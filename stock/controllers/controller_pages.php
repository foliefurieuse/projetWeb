<?php
class PagesController
{
    public function __construct()
    {
    }

    public function home()
    {
        
        require_once('views/pages/home.php');
    }
    public function error()
    {
        require_once('views/pages/err.php');
    }
}
