<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 29.05.2016
 * Time: 21:46
 */
class AdminNewsController extends AdminBase {
    public function actionIndex() {
        self::checkAdmin();
        $newsList = News::getNewsList();

        require_once (ROOT.'/views/admin_news/index.php');
        return true;
    }

    public function actionDelete($id) {
        self::checkAdmin();
        if ( isset($_POST['submit']) ) {
            News::deleteNewsById($id);
            header("Location: /admin/news");
        }

        require_once (ROOT.'/views/admin_news/delete.php');
        return true;
    }

    public function actionCreate() {
        self::checkAdmin();
        if ( isset($_POST['submit']) ) {
            $option = array();
            $option['title'] = $_POST['title'];
            $option['short_content'] = $_POST['short_content'];
            $option['content'] = $_POST['content'];
            $errors = false;
            if (!isset($option['title']) || empty($option['title'])) {
                $errors[] = 'Заполните поле с названием';
            }
            if (!isset($option['short_content']) || empty($option['short_content'])) {
                $errors[] = 'Заполните поле с описанием';
            }
            if (!isset($option['content']) || empty($option['content'])) {
                $errors[] = 'Заполните поле с текстом';
            }
            if ( $errors == false ) {
                $id = News::createNews($option);
                if ( $id ) {
                    if ( is_uploaded_file($_FILES['image']['tmp_name']))
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/template/images/news/{$id}.jpg");
                }
            }
        }

        require_once (ROOT.'/views/admin_news/create.php');
        return true;
    }

    public function actionUpdate($id) {
        self::checkAdmin();
        $news = News::getNewsItemById($id);
        $imgUrl = News::getImage($id);
        if (isset($_POST['submit'])) {
            $option = array();
            $option['title'] = $_POST['title'];
            $option['short_content'] = $_POST['short_content'];
            $option['content'] = $_POST['content'];
            if (News::updateNewsById($id, $options)) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/news/{$id}.jpg");
                }
            }

            header("Location: /admin/news");
        }

        require_once(ROOT . '/views/admin_news/update.php');
        return true;
    }
}