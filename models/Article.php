<?php
	class Article {
	    const SHOW_BY_DEFAULT = 8;

	    public static function getLatestArticles($count = self::SHOW_BY_DEFAULT) {
	        $count = intval($count);
	        $db = Db::getConnection();
	        $articlesList = array();

	        $result = $db->query('SELECT id, title, headtext, date '.
								'FROM articles '.
								'ORDER BY date DESC '.
								'LIMIT '.$count);

	        $i = 0;
	        while ( $row = $result->fetch() ) {
				$articlesList[$i]['id'] = $row['id'];
				$articlesList[$i]['title'] = $row['title'];
				$articlesList[$i]['date'] = self::recToDate($row['date']);
				$articlesList[$i]['headtext'] = $row['headtext'];
				$i++;
	        }

	        return $articlesList;
	    }

	    public static function getArticlesList() {
	        $db = Db::getConnection();
	        $articlesList = array();

	        $result = $db->query('SELECT id, title, headtext, date '.
								'FROM articles '.
								'ORDER BY date DESC');

	        $i = 0;
	        while ( $row = $result->fetch() ) {
				$articlesList[$i]['id'] = $row['id'];
				$articlesList[$i]['title'] = $row['title'];
				$articlesList[$i]['date'] = self::recToDate($row['date']);
				$articlesList[$i]['headtext'] = $row['headtext'];
				$i++;
	        }

	        return $articlesList;
	    }

	    public  static  function getArticlesListByPage($page = 1, $id = true) {
	        if ( $id ) {
	            $page = intval($page);
	            $offset = ($page - 1 ) * self::SHOW_BY_DEFAULT;

	            $db = Db::getConnection();
	            $articlesList = array();

	            $result = $db->query("SELECT id, title, headtext, date FROM articles ".
	                "ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT.
	                " OFFSET ".$offset);

	            $i = 0;
	            while ( $row = $result->fetch() ) {
					$articlesList[$i]['id'] = $row['id'];
					$articlesList[$i]['title'] = $row['title'];
					$articlesList[$i]['date'] = self::recToDate($row['date']);
					$articlesList[$i]['headtext'] = $row['headtext'];
					$i++;
	            }

	            return $articlesList;
	        }

	        return false;
	    }

		public static function getArticleItemById($id) {
			$id = intval($id);

			if ( $id ) {
				$db = Db::getConnection();

				$result = $db->query('SELECT * FROM articles WHERE id='.$id);
				$result->setFetchMode(PDO::FETCH_ASSOC);

				$articleItem = $result->fetch();

				return $articleItem;
			}

			return false;
		}

		private static function recToDate($date) {
			$preg = preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $date, $matches);
			return $matches[3].".".$matches[2].".".$matches[1];
		}

	    public static function getTotalArticles() {
	        $db = Db::getConnection();
	        
	        $result = $db->query('SELECT count(id) AS count FROM articles');
	        $result->setFetchMode(PDO::FETCH_ASSOC);
	        $row = $result->fetch();

	        return $row['count'];
	    }

	    public static function getImage($id) {
	        $noImage = 'no-image.jpg';

	        $path = '/template/images/articles/';
	        $pathToNewsImage = $path . $id . '.jpg';
	        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToNewsImage)) {
	            return $pathToNewsImage;
	        }

	        return $path . $noImage;
	    }

	    public static function deleteArticleById($id) {
	        $db = Db::getConnection();
	        $query = "DELETE FROM articles WHERE id = :id";
	        $result = $db->prepare($query);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        return $result->execute();
	    }

	    public static function createArticle($opt) {
	        $db = Db::getConnection();
	        $query = "INSERT INTO articles (title, headtext, content, date)
	                  VALUES (:title, :headtext, :content, NOW())";
	        $result = $db->prepare($query);
	        $result->bindParam(':title', $opt['title'], PDO::PARAM_STR);
	        $result->bindParam(':headtext', $opt['headtext'], PDO::PARAM_STR);
	        $result->bindParam(':content', $opt['content'], PDO::PARAM_STR);
	        if ( $result->execute() )
	            return $db->lastInsertId();
	        return 0;
	    }

	    public static function updateArticleById($id, $options) {
	        $db = Db::getConnection();

	        $sql = "UPDATE articles
	            SET 
	                title = :title, 
	                headtext = :headtext, 
	                content = :content 
	            WHERE id = :id";
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
	        $result->bindParam(':headtext', $options['headtext'], PDO::PARAM_STR);
	        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
	        return $result->execute();
	    }
	}
?>