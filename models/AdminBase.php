<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 29.05.2016
 * Time: 21:38
 */
class AdminBase
{
    public static function checkAdmin() {
        if ( User::checkLogged() ) {
            return true;
        }

        header('Location: /admin/login/');
        die();
    }
}