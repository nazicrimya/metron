<?php $titleMain = $new['title']." | Метрон"; $currentUrl = "НОВОСТИ"; include ROOT.'/views/layouts/header.php'; ?>
	<div class="container">	
		<div class="newQ">
			<h1 class="headOfTitle text-center"><?php echo $new['title']; ?></h1>
			<img src="<?php echo News::getImage($new['id']); ?>">
			<p><?php echo $new['content']; ?></p>
			<span class="date"><?php preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $new['date'], $matches); echo $matches[3]."-".$matches[2]."-".$matches[1]; ?></span>
		</div>
	</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>