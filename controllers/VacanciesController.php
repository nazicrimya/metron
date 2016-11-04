<?php 
class VacanciesController
{
	public static function actionIndex() {
		$vacancies = array();
		$vacancies = Vacancies::getVacancies();
		
		require_once ROOT.'/views/vacancies/index.php';
		return true;
	}
}
?>