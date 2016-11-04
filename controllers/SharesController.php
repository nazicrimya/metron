<?php 
class SharesController
{
	public static function actionIndex() {
		$shares = array();
		$shares = Shares::getShares();
		
		require_once ROOT.'/views/shares/index.php';
		return true;
	}
}
?>