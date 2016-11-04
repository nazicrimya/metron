<?php
	class Db
	{
		public static function getConnection() {
			$params = include 'db_params.php';
			try {
				$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
				$db = new PDO($dsn, $params['user'], $params['password']);
				$db->exec("set names utf8");
			} catch (PDOException $e) {
				echo "Установка соединения с базой данных потеряна";
			}
			return $db;
		}
	}
?>