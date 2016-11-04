<?php $titleMain = "Акции | Метрон"; $currentUrl = "АКЦИИ"; include ROOT.'/views/layouts/header.php'; ?>
	<div class="container">	
		<h1 class="headOfTitle text-left mar-left">Акции</h1>
		<?php $totalS = Shares::getTotalShares(); ?>
		<?php if($totalS == 0): ?>
			<h3 class="text-center">Акций пока нет, приходите позже:(</h3>
		<?php else: ?>
			<div id="descS" class="mar-left"><i>Хотите купить продукцию Метрон по специальной цене? Интересуют акции и скидки на автомобильные весы и сервис? Узнайте, как Вы можете сэкономить на приобретении весов. </i></div>
			<?php $inc = 0; ?>
			<?php foreach ($shares as $shareItem): ?>
				<?php $inc += 1; ?>
				<div class="sharePost">	
					<span class="date"><?php echo $shareItem['date'];?></span>
					<h3 class="title"><?php echo $shareItem['title'];?></h1>
					<p><?php echo $shareItem['description'];?></p>
				</div>	

				<?php if ($totalS % 2 != 0) $totalS += 1; ?>
				<?php if ($totalS / 2 == $inc): ?>
					<div id="alertion">
						<div class="photo"></div>
						<span class="mar-left50">Подробно обсудить технические параметры и все интересующие Вас вопросы Вы можете по телефону <i><b>8 800 200-2-200 (звонок бесплатен)</b></i> или пригласив нашего специалиста к себе на предприятие.</span>
						<div class="line">
							<div class="closeBanner mar-left50"><span>ЗАКРЫТЬ</span></div>
						</div>
					</div>
					<script type="text/javascript">
						$('.closeBanner').click(function () {
							$('#alertion').fadeOut("slow");
						});
					</script>
				<?php endif; ?>

			<?php endforeach; ?>
		<?php endif; ?>
	</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>