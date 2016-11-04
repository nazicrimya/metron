<?php 
class SearchController
{
	public static function actionIndex() {
		require_once ROOT.'/views/search/index.php';
		return true;
	}
}
?>