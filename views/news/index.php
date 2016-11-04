<?php $titleMain = "Новости | Метрон"; $currentUrl = "НОВОСТИ"; include ROOT.'/views/layouts/header.php'; ?>
	<div class="container">	
		<h1 class="headOfTitle text-center">Новости компании</h1>
		<?php if(News::getTotalNews() == 0): ?>
			<h3>Новостей нет:(</h3>
		<?php else: ?>
			<?php foreach ($news as $newsItem): ?>
				<a href="/news/<?php echo $newsItem['id']; ?>">
					<div class="newsPost">	
						<span class="date"><?php echo $newsItem['date']; ?></span>
						<img src="<?php echo News::getImage($newsItem['id']); ?>">
						<h3 class="title"><?php echo $newsItem['title']; ?></h1>
						<p><?php echo $newsItem['short_content']; ?></p>
					</div>	
				</a>
			<?php endforeach; ?>
			<div class="pag"><?php echo $pagination->get();?></div>
		<?php endif; ?>
	</div>
	
<?php include ROOT.'/views/layouts/footer.php'; ?>