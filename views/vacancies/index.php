<?php $titleMain = "Вакансии | Метрон"; $currentUrl = "ВАКАНСИИ"; include ROOT.'/views/layouts/header.php'; ?>
	<div class="container">	
		<h1 class="headOfTitle text-left">Вакансии</h1>
		<?php if(Vacancies::getTotalVacancies() == 0): ?>
			<h3 class="pad-left">К сожалению, вакансий нет:(</h3>
		<?php else: ?>
			<?php foreach ($vacancies as $vacancyItem): ?>
				<div class="articleVac">	
					<div class="activeButton">
						<h3 class="title"><?php echo $vacancyItem['title']; ?></h3>
						<span class="description"><?php echo $vacancyItem['description']; ?></span>
					</div>
					<div class="hiddenBlock">

						<h3 class="smallTitle">Обязанности:</h3>
						<ul>
							<?php foreach ($vacancyItem['duties'] as $item): ?>
								<li><?php echo $item; ?></li>
							<?php endforeach; ?>
						</ul>

						<h3 class="smallTitle">Требования:</h3>
						<ul>
							<?php foreach ($vacancyItem['requirements'] as $item): ?>
								<li><?php echo $item; ?></li>
							<?php endforeach; ?>
						</ul>

						<h3 class="smallTitle">Мы предлагаем:</h3>
						<ul>
							<?php foreach ($vacancyItem['ouroffers'] as $item): ?>
								<li><?php echo $item; ?></li>
							<?php endforeach; ?>
						</ul>


						<h3 class="smallTitle">Адрес:</h3>
						<span class="adress">
							Ростов-на-Дону, ул. Металлургическая, 102/2, офис 607<br>
							+7 (863) 200-37-67<br>
							hr@ltdmetron.com
						</span>

						<div class="closeHidden">ЗАКРЫТЬ</div>
					</div>
				</div>	
			<?php endforeach; ?>
			<script type="text/javascript">
			    
				$('.activeButton').click(function() {
					$(this).siblings('.hiddenBlock').slideDown("fast");
					$('.closeHidden').click(function() {
						$(this).parent('.hiddenBlock').slideUp("fast");
					});
				});
			</script>
		<?php endif; ?>
	</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>