<?php 
class NewsController
{
	public static function actionIndex($page = 1) {
		$news = array();
		$news = News::getNewsListByPage($page);

		$total = News::getTotalNews();
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');
		require_once ROOT.'/views/news/index.php';
		return true;
	}

	public static function actionView($id) {
		$new = News::getNewsItemById($id);
		require_once ROOT.'/views/news/view.php';
		return true;
	}
}
?>