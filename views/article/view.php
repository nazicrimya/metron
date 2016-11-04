<?php $titleMain = $article['title']." | Метрон"; $currentUrl = "СТАТЬИ"; include ROOT.'/views/layouts/header.php'; ?>
	<div class="container">	
		<div class="art">
			<h1 class="headOfTitle text-center"><?php echo $article['title']; ?></h1>
			<h3 class="text-center"><i><?php echo $article['headtext']; ?></i></h3>
			<img src="<?php echo Article::getImage($article['id']); ?>">
			<p><?php echo $article['content']; ?></p>
			<span class="date"><?php preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $article['date'], $matches); echo $matches[3]."-".$matches[2]."-".$matches[1]; ?></span>
		</div>
	</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>