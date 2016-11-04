<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 29.05.2016
 * Time: 21:46
 */
class AdminArticleController extends AdminBase {
    public function actionIndex() {
        self::checkAdmin();
        $articleList = Article::getArticlesList();

        require_once (ROOT.'/views/admin_article/index.php');
        return true;
    }

    public function actionDelete($id) {
        self::checkAdmin();
        if ( isset($_POST['submit']) ) {
            Article::deleteArticleById($id);
            header("Location: /admin/article");
        }

        require_once (ROOT.'/views/admin_article/delete.php');
        return true;
    }

    public function actionCreate() {
        self::checkAdmin();
        if ( isset($_POST['submit']) ) {
            $option = array();
            $option['title'] = $_POST['title'];
            $option['headtext'] = $_POST['headtext'];
            $option['content'] = $_POST['content'];
            $errors = false;
            if (!isset($option['title']) || empty($option['title'])) {
                $errors[] = 'Заполните поле с названием';
            }
            if (!isset($option['headtext']) || empty($option['headtext'])) {
                $errors[] = 'Заполните поле с описанием';
            }
            if (!isset($option['content']) || empty($option['content'])) {
                $errors[] = 'Заполните поле с текстом';
            }
            if ( $errors == false ) {
                $id = Article::createArticle($option);
                if ( $id ) {
                    if ( is_uploaded_file($_FILES['image']['tmp_name']))
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/template/images/articles/{$id}.jpg");
                }
            }
        }

        require_once (ROOT.'/views/admin_article/create.php');
        return true;
    }

    public function actionUpdate($id) {
        self::checkAdmin();
        $articles = Article::getArticleItemById($id);
        $imgUrl = Article::getImage($id);
        if (isset($_POST['submit'])) {
            $option = array();
            $option['title'] = $_POST['title'];
            $option['headtext'] = $_POST['headtext'];
            $option['content'] = $_POST['content'];
            if (Article::updateArticleById($id, $option)) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/articles/{$id}.jpg");
                }
            }
        }

        require_once(ROOT . '/views/admin_article/update.php');
        return true;
    }
}