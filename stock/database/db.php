<?php
class DBConnect
{
    private static $instance=NULL;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=localhost;dbname=prod_sc", "prod_sc", "password", NULL);
        } //end if
        return self::$instance;
    } //end function

    public static function closeInstance()
    {
        if (isset(self::$instance)) {
            self::$instance=NULL;
        }
    }
}// en class
