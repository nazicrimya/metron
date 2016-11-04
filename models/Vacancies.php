<?php 
	class Vacancies {
	    public static function getVacancies() {
	        $db = Db::getConnection();
	        $vacanciesList = array();
	        $result = $db->query('SELECT * FROM vacancies '.
								'ORDER BY id DESC');

	        $i = 0;
	        while ( $row = $result->fetch() ) {
				$vacanciesList[$i]['title'] = $row['title'];
				$vacanciesList[$i]['description'] = $row['description'];
				$vacanciesList[$i]['duties'] = json_decode($row['duties'], true);					# JSON ----> Array()
				$vacanciesList[$i]['requirements'] = json_decode($row['requirements'], true);		# JSON ----> Array()
				$vacanciesList[$i]['ouroffers'] = json_decode($row['ouroffers'], true);				# JSON ----> Array()
				$vacanciesList[$i]['adress'] = $row['adress'];
				$i++;
	        }

	        return $vacanciesList;
	    }

	    public static function getTotalVacancies() {
	        $db = Db::getConnection();
	        
	        $result = $db->query('SELECT count(id) AS count FROM vacancies');
	        $result->setFetchMode(PDO::FETCH_ASSOC);
	        $row = $result->fetch();

	        return $row['count'];
	    }
	}
?>