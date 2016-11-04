<?php $titleMain = "Статьи | Метрон"; $currentUrl = "СТАТЬИ"; include ROOT.'/views/layouts/header.php'; ?>
	<div class="container">	
		<h1 class="headOfTitle text-left mar-left">Статьи</h1>
		<?php if(Article::getTotalArticles() == 0): ?>
			<h3>Статей нет:(</h3>
		<?php else: ?>
			<?php foreach ($articles as $articleItem): ?>
					<div class="articlePost">	
						<span class="date"><?php echo $articleItem['date']; ?></span>
						<a href="/articles/<?php echo $articleItem['id']; ?>">
							<h3 class="title"><?php echo $articleItem['title']; ?></h1>
						</a>
						<p><?php echo $articleItem['headtext']; ?></p>
					</div>	
			<?php endforeach; ?>
			<div class="pag"><?php echo $pagination->get();?></div>
		<?php endif; ?>
	</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>