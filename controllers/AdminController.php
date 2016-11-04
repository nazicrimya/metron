<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 29.05.2016
 * Time: 21:36
 */
class AdminController extends AdminBase
{
    public function actionIndex() {
        self::checkAdmin();

        require_once (ROOT.'/views/admin/index.php');
        return true;
    }

    public function actionLogin() {
        $login = '';
        $password = '';

        if ( isset($_POST['submit']) ) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            if ( !User::checkName($login) )
                $errors[] = 'Неправильный логин';

            if ( !User::checkPassword($password))
                $errors[] = 'Неправильный пароль';

            $userId = User::checkUserData($login, $password);

            if ( $userId == false)
                $errors[] = 'Неправильные данные для входа в панель';
            else {
                User::auth($userId);
                header("Location: /admin/");
            }
        }

        require_once(ROOT.'/views/user/login.php');

        return true;
    }

    public function actionRegister() {
        self::checkAdmin();
        $login = '';
        $password = '';
        $result = false;

        if ( isset( $_POST['submit'] ) ) {
            $login = $_POST['loginReg'];
            $password = $_POST['passwordReg'];

            $errors = false;

            if ( !USER::checkName($login) )
                $errors[] = 'Неправильный логин';

            if ( !USER::checkPassword($password) )
                $errors[] = 'Неправильный пароль';

            if ( USER::checkLoginExists($login) )
                $errors[] = 'Данный логин уже используется';

            if ( $errors == false ) {
                $result = User::register($login, $password);
            }

        }

        require_once (ROOT.'/views/user/register.php');

        return true;
    }

    public function actionEdit() {
        self::checkAdmin();
        $password = '';
        $result = false;
        $user = User::getUserById($_SESSION['userId']);

        if ( isset( $_POST['submit'] ) ) {
            $pass = $_POST['passwordEd'];
            $passRepeat = $_POST['passwordEdRep'];

            $errors = false;

            if ( !USER::checkPassword($pass) )
                $errors[] = 'Неправильный пароль';

            if ( $pass != $passRepeat )
                $errors[] = 'Пароли разные';

            if ( $errors == false ) {
                $result = User::edit($_SESSION['userId'], $user['login'], $pass);
            }

        }

        require_once (ROOT.'/views/user/edit.php');

        return true;
    }
    
    public function actionLogout() {
        unset($_SESSION['userId']);
        header("Location: /");
    }
}