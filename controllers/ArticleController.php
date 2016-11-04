<?php 
class ArticleController
{
	public static function actionIndex($page = 1) {
		$articles = array();
		$articles = Article::getArticlesListByPage($page);

		$total = Article::getTotalArticles();
        $pagination = new Pagination($total, $page, Article::SHOW_BY_DEFAULT, 'page-');
		require_once ROOT.'/views/article/index.php';
		return true;
	}

	public static function actionView($id) {
		$article = Article::getArticleItemById($id);
		require_once ROOT.'/views/article/view.php';
		return true;
	}
}
?>