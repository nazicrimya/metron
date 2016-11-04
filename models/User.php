<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.05.2016
 * Time: 13:52
 */
class User
{
    public static function register($login, $password) {
        $db = Db::getConnection();

        $result = $db->prepare('INSERT INTO user (login, password)'.
                                ' VALUES (:login, :password)');
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkUserData($login, $password) {
        $db = Db::getConnection();

        $query = 'SELECT * FROM user WHERE login = :login AND password = :password';
        $res = $db->prepare($query);
        $res->bindParam(':login', $login, PDO::PARAM_STR);
        $res->bindParam(':password', $password, PDO::PARAM_STR);
        $res->execute();

        $user = $res->fetch();
        if ( $user )
            return $user['id'];
        return false;
    }

    public static function auth($id) {
        $_SESSION['userId'] = $id;
    }

    public static function checkLogged() {
        if ( isset($_SESSION['userId']) )
            return $_SESSION['userId'];

        return false;
        header("Location: /user/login");
    }

    public static function checkName($name) {
        if ( strlen($name) >= 2 )
            return true;

        return false;
    }

    public static function checkPassword($password) {
        if ( strlen($password) >= 6 )
            return true;

        return false;
    }

    public static function checkEmail($email) {
        if ( filter_var($email, FILTER_VALIDATE_EMAIL) )
            return true;

        return false;
    }

    public static function checkLoginExists($login) {
        $db = Db::getConnection();

                // Спросить
        $result = $db->prepare("SELECT COUNT(*) FROM user WHERE login=:login");
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->execute();

        if ( intval($result->fetchColumn()) )
            return true;

        return false;
    }

    public static function getUserById($id) {
        if ( $id ) {
            $db = Db::getConnection();
            $query = 'SELECT * FROM user WHERE id = :id';
            $res = $db->prepare($query);
            $res->bindParam(':id', $id, PDO::PARAM_INT);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute();

            return $res->fetch();
        }
    }

    public static function edit($id, $login, $password) {
        $db = Db::getConnection();
        $query = "UPDATE user SET login = :login,
                  password = :password WHERE id = :id";
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':login', $login, PDO::PARAM_STR);
        $res->bindParam(':password', $password, PDO::PARAM_STR);
        return $res->execute();
    }
}