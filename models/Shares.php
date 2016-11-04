<?php 
	class Shares {
		public static function getSharesImage() {
	        $db = Db::getConnection();
	        $sharesList = array();
	        $result = $db->query('SELECT id, src, alt '.
								'FROM sharesimg '.
								'ORDER BY id DESC');

	        $i = 0;
	        while ( $row = $result->fetch() ) {
				$sharesList[$i]['id'] = $row['id'];
				$sharesList[$i]['src'] = $row['src'];
				$sharesList[$i]['alt'] = $row['alt'];
				$i++;
	        }
	        return $sharesList;
		}

	    public static function getShares() {
	        $db = Db::getConnection();
	        $sharesList = array();
	        $result = $db->query('SELECT id, title, description, date '.
								'FROM shares '.
								'ORDER BY date DESC');

	        $i = 0;
	        while ( $row = $result->fetch() ) {
				$sharesList[$i]['id'] = $row['id'];
				$sharesList[$i]['title'] = $row['title'];
				$sharesList[$i]['date'] = self::recToDate($row['date']);
				$sharesList[$i]['description'] = $row['description'];
				$i++;
	        }
	        return $sharesList;
	    }
	    
		private static function recToDate($date) {
			$preg = preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $date, $matches);
			return $matches[3].".".$matches[2].".".$matches[1];
		}

	    public static function getTotalShares() {
	        $db = Db::getConnection();
	        
	        $result = $db->query('SELECT count(id) AS count FROM shares');
	        $result->setFetchMode(PDO::FETCH_ASSOC);
	        $row = $result->fetch();

	        return $row['count'];
	    }

	    public static function getTotalSharesImg() {
	        $db = Db::getConnection();
	        
	        $result = $db->query('SELECT count(id) AS count FROM sharesimg');
	        $result->setFetchMode(PDO::FETCH_ASSOC);
	        $row = $result->fetch();

	        return $row['count'];
	    }

	    public static function deleteSharesById($id) {
	        $db = Db::getConnection();
	        $query = "DELETE FROM shares WHERE id = :id";
	        $result = $db->prepare($query);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        return $result->execute();
	    }

	    public static function createShares($opt) {
	        $db = Db::getConnection();
	        $query = "INSERT INTO shares (title, description, date)
	                  VALUES (:title, :description, NOW())";
	        $result = $db->prepare($query);
	        $result->bindParam(':title', $opt['title'], PDO::PARAM_STR);
	        $result->bindParam(':description', $opt['description'], PDO::PARAM_STR);
	        if ( $result->execute() )
	            return $db->lastInsertId();
	        return 0;
	    }

	    public static function updateSharesById($id, $options) {
	        $db = Db::getConnection();

	        $sql = "UPDATE shares
	            SET 
	                title = :title, 
	                description = :description
	            WHERE id = :id";
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
	        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
	        return $result->execute();
	    }

	    public static function addImage() {
	        $db = Db::getConnection();
	        $query = "INSERT INTO sharesimg (src, alt)
	                  VALUES (:src, :alt)";
	        $result = $db->prepare($query);
	        $result->bindParam(':src', $src, PDO::PARAM_STR);
	        $alt = "Slider image";
	        $result->bindParam(':alt', $alt, PDO::PARAM_STR);
	        if ($result->execute()) {
	        	return $db->lastInsertId();
	        }
	    }

	    public static function addSrc($id, $src) {
	        $db = Db::getConnection();
	        $query = "UPDATE sharesimg 
			            SET 
			                src = :src 
			            WHERE id = :id";
	        $result = $db->prepare($query);
	        $result->bindParam(':src', $src, PDO::PARAM_STR);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        $result->execute();
	    }

	    public static function deleteSlide($id = false) {
	        $db = Db::getConnection();
	        $query = "DELETE FROM sharesimg WHERE id = :id";
	    	if ($id) {
	        	$result = $db->prepare($query);
	        	$result->bindParam(':id', $id, PDO::PARAM_INT);
	        	$result->execute();
	        	return true;
	    	}
	    }
	}
?>