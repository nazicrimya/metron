<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 29.05.2016
 * Time: 21:46
 */
class AdminSharesController extends AdminBase {
    public function actionIndex() {
        self::checkAdmin();
        $sharesList = Shares::getShares();
        $slides = Shares::getSharesImage();

        require_once (ROOT.'/views/admin_shares/index.php');
        return true;
    }

    public function actionPlusslide() {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            if ( is_uploaded_file($_FILES['slide']['tmp_name'])) {
                $id = Shares::addImage();
                Shares::addSrc($id, "/template/images/slider-images/{$id}.jpg");
                move_uploaded_file($_FILES['slide']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/template/images/slider-images/{$id}.jpg");
            }
        }
        require_once (ROOT.'/views/admin_shares/plus.php');
        return true;
    }

    public function actionMinusslide($id) {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Shares::deleteSlide($id);
            header("Location: /admin/shares");
        }
        require_once (ROOT.'/views/admin_shares/minus.php');
        return true;
    }

    public function actionDelete($id) {
        self::checkAdmin();
        if ( isset($_POST['submit']) ) {
            Shares::deleteSharesById($id);
            header("Location: /admin/shares");
        }

        require_once (ROOT.'/views/admin_shares/delete.php');
        return true;
    }

    public function actionCreate() {
        self::checkAdmin();
        if ( isset($_POST['submit']) ) {
            $option = array();
            $option['title'] = $_POST['title'];
            $option['description'] = $_POST['description'];
            $errors = false;
            if (!isset($option['title']) || empty($option['title'])) {
                $errors[] = 'Заполните поле с названием';
            }
            if (!isset($option['description']) || empty($option['description'])) {
                $errors[] = 'Заполните поле с описанием';
            }
            if ( $errors == false ) 
                $id = Shares::createShares($option);
        }

        require_once (ROOT.'/views/admin_shares/create.php');
        return true;
    }

    public function actionUpdate($id) {
        self::checkAdmin();
        $articles = Shares::getSharesItemById($id);
        if (isset($_POST['submit'])) {
            $option = array();
            $option['title'] = $_POST['title'];
            $option['description'] = $_POST['description'];
            Shares::updateSharesById($id, $option);
        }

        require_once(ROOT . '/views/admin_article/update.php');
        return true;
    }
}