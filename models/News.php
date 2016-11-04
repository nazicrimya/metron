<?php
	class News {
	    const SHOW_BY_DEFAULT = 6;

	    public static function getLatestNews($count = self::SHOW_BY_DEFAULT) {
	        $count = intval($count);
	        $db = Db::getConnection();
	        $newsList = array();

	        $result = $db->query('SELECT id, title, date, short_content '.
								'FROM news '.
								'ORDER BY date DESC '.
								'LIMIT '.$count);

	        $i = 0;
	        while ( $row = $result->fetch() ) {
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['title'] = $row['title'];
				$newsList[$i]['date'] = self::recToDate($row['date']);
				$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
	        }

	        return $newsList;
	    }

	    public  static  function getNewsListByPage($page = 1, $id = true) {
	        if ( $id ) {
	            $page = intval($page);
	            $offset = ($page - 1 ) * self::SHOW_BY_DEFAULT;

	            $db = Db::getConnection();
	            $newsList = array();

	            $result = $db->query("SELECT id, title, date, short_content FROM news ".
	                "ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT.
	                " OFFSET ".$offset);

	            $i = 0;
	            while ( $row = $result->fetch() ) {
					$newsList[$i]['id'] = $row['id'];
					$newsList[$i]['title'] = $row['title'];
					$newsList[$i]['date'] = self::recToDate($row['date']);
					$newsList[$i]['short_content'] = $row['short_content'];
					$i++;
	            }

	            return $newsList;
	        }

	        return false;
	    }

		public static function getNewsItemById($id) {
			$id = intval($id);

			if ( $id ) {
				$db = Db::getConnection();

				$result = $db->query('SELECT * FROM news WHERE id='.$id);
				$result->setFetchMode(PDO::FETCH_ASSOC);

				$newsItem = $result->fetch();

				return $newsItem;
			}

			return false;
		}

		private static function recToDate($date) {
			$preg = preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $date, $matches);
			return "<h1>".$matches[3]."</h1><h3 class='text-right'>".$matches[2]."</h3>".$matches[1];
		}

		private static function recToDateFine($date) {
			$preg = preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $date, $matches);
			return "".$matches[3].".".$matches[2].".".$matches[1];
		}

		public static function getNewsList() {
			$db = Db::getConnection();

			$newsList = array();

			$result = $db->query('SELECT id, title, date, short_content '.
								'FROM news '.
								'ORDER BY date DESC');

			$i = 0;
			while ( $row = $result->fetch() ) {
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['title'] = $row['title'];
				$newsList[$i]['date'] = self::recToDateFine($row['date']);
				$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
			}

			return $newsList;
		}

	    public static function getTotalNews() {
	        $db = Db::getConnection();
	        
	        $result = $db->query('SELECT count(id) AS count FROM news');
	        $result->setFetchMode(PDO::FETCH_ASSOC);
	        $row = $result->fetch();

	        return $row['count'];
	    }

	    public static function deleteNewsById($id) {
	        $db = Db::getConnection();
	        $query = "DELETE FROM news WHERE id = :id";
	        $result = $db->prepare($query);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        return $result->execute();
	    }

	    public static function createNews($opt) {
	        $db = Db::getConnection();
	        $query = "INSERT INTO news (title, date, short_content, content)
	                  VALUES (:title, NOW(), :short_content, :content)";
	        $result = $db->prepare($query);
	        $result->bindParam(':title', $opt['title'], PDO::PARAM_STR);
	        $result->bindParam(':short_content', $opt['short_content'], PDO::PARAM_STR);
	        $result->bindParam(':content', $opt['content'], PDO::PARAM_STR);
	        if ( $result->execute() )
	            return $db->lastInsertId();
	        return 0;
	    }

	    public static function updateNewsById($id, $options) {
	        $db = Db::getConnection();

	        $sql = "UPDATE news
	            SET 
	                title = :title, 
	                short_content = :short_content, 
	                content = :content
	            WHERE id = :id";

	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
	        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
	        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
	        return $result->execute();
	    }

	    public static function getImage($id) {
	        $noImage = 'no-image.jpg';

	        $path = '/template/images/news/';
	        $pathToNewsImage = $path . $id . '.jpg';
	        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToNewsImage)) {
	            return $pathToNewsImage;
	        }

	        return $path . $noImage;
	    }
	}
?>