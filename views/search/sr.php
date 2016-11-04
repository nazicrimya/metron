<?php 
include 'db.php';
$word = $_POST['search'];
if (isset($word)) {
    $db = Db::getConnection();

    $result = $db->query("SELECT id, title, date, short_content FROM news ".
    	"WHERE UCASE(title) LIKE '%" . mb_strtoupper($word, 'utf-8') . "%' ".
    	"OR UCASE(short_content) LIKE '%" . mb_strtoupper($word, 'utf-8') . "%' ".
    	"ORDER BY title DESC LIMIT 10");
    $res = $result->fetch(PDO::FETCH_ASSOC);
    if (!$res) 
    	echo "<div class='it text-left mar-left'>Ничего не найдено</div>";
    else {
    	echo "<div class='it text-left mar-left'>Найдено: ".count($res)."</div><br>";
    	$i = 0;
    	$searchList = array();
        while ( $ro = $res ) {
            print_r($ro);
			$searchList[$i]['id'] = $ro['id'];
			$searchList[$i]['title'] = $ro['title'];
			$preg = preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $row['date'], $matches);
        	$searchList[$i]['date'] = $matches[3].".".$matches[2].".".$matches[1];
			$searchList[$i]['short_content'] = $ro['short_content'];
			$i++;
            print_r($searchList[0]);
        }
        var_dump($searchList);
        foreach ($searchList as $row) {
			$preg = preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $row['date'], $matches);
        	$row['date'] = $matches[3].".".$matches[2].".".$matches[1];
			echo "<a href='/news/".$row['id']."' class='searchLink'>";
				echo "<div class='date'>".$row['date']."</div>";
				echo "<div class='another'>";
					echo "<div class='title'>".$row['title']."</div>";
					echo "<div class='content'>".$row['short_content']."</div>";
				echo "</div>";
			echo "</a>";
			
        }
    }
}