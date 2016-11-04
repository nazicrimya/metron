<?php $pageNum = 3; $isMain = true; $titleMain = "Клиенты | Метрон"; $currentUrl = "ЕЩЕ..."; include ROOT.'/views/layouts/header.php'; ?>
            <div id="content">
                <div class="autoMargin allScreenPad">
                    <div class="container zeroMargin">
                    <div class="down" id="row_down"></div>
                    <div class="both"></div>
                    <h2 class="headOfTitle" id="aboutVC">Нам доверяют</h2>
                    <p class="about"><span class="it" style="display: inline-block; border-left: 1px solid #000; padding-left: 10px;">За время нашей работы на юге России мы поставили большое количество нашей продукции для различных предприятий: от небольших фермерских хозяйств до крупнейших холдингов работающих как в России, так и за её пределами.</span></p>
                    <img src="/template/images/assets/Clients.png" alt="" style="padding-left: 30px;">
                    <h2 class="headOfTitle" id="fbVC">Отзывы</h2>
                    <img src="/template/images/assets/Feedbacks.png" alt="" style="padding-left: 30px;">
                    <h2 class="headOfTitle" id="parVC">Партнеры</h2>
                    <img src="/template/images/assets/Partners.png" alt="" style="padding-left: 30px;">
                    <h2 class="headOfTitle" id="photVC">Фотогалерея</h2>
                    <div class="photoPal">
                        <img src="/template/images/assets/photo.png" alt="">
                        <div class="descr">Низкопрофильные бесфундаментные автомобильные весы <b>Сармат</b> 80 грузоподъемностью 80 тонн</div>
                    </div>
                    <div class="photoPal">
                        <img src="/template/images/assets/photo.png" alt="">
                        <div class="descr">Низкопрофильные бесфундаментные автомобильные весы <b>Сармат</b> 80 грузоподъемностью 80 тонн</div>
                    </div>
                    <div class="photoPal">
                        <img src="/template/images/assets/photo.png" alt="">
                        <div class="descr">Низкопрофильные бесфундаментные автомобильные весы <b>Сармат</b> 80 грузоподъемностью 80 тонн</div>
                    </div>
                    <div class="photoPal">
                        <img src="/template/images/assets/photo.png" alt="">
                        <div class="descr">Низкопрофильные бесфундаментные автомобильные весы <b>Сармат</b> 80 грузоподъемностью 80 тонн</div>
                    </div>
                    <script type="text/javascript">
                        var w = $(".container").width() / 2;
                        $(".photoPal").css({"width": w});
                    </script>
                 </div>
            </div>
        </div>
        </div>
            
        

        <script type="text/javascript">
            cuteScroll($("#row_down"), $('#aboutVC'));
            cuteScroll($("#fbLink"), $('#fbVC'));
            cuteScroll($("#parthLink"), $('#parVC'));
            cuteScroll($("#photoLink"), $('#photVC'));
            cuteScroll($("#fbV"), $('#fbVC'));
            cuteScroll($("#parV"), $('#parVC'));
            cuteScroll($("#photV"), $('#photVC'));
        
        	$('#fbVC').on('scrollSpy:enter', function() {
        		var valOfTitile = $(this).text().toUpperCase();
        		console.log('<i class="icon-reorder"></i>' + valOfTitile);
        		$('.show').html('<i class="icon-reorder"></i> ' + valOfTitile);
        	});        
        	$('#fbVC').scrollSpy();
        	
        	$('#parVC').on('scrollSpy:enter', function() {
        		var valOfTitile = $(this).text().toUpperCase();
        		console.log('<i class="icon-reorder"></i>' + valOfTitile);
        		$('.show').html('<i class="icon-reorder"></i> ' + valOfTitile);
        	});
        	$('#parVC').scrollSpy();
        	
        	$('#photVC').on('scrollSpy:enter', function() {
        		var valOfTitile = $(this).text().toUpperCase();
        		console.log('<i class="icon-reorder"></i>' + valOfTitile);
        		$('.show').html('<i class="icon-reorder"></i> ' + valOfTitile);
        	});
        	$('#photVC').scrollSpy();
        </script>

<?php include ROOT.'/views/layouts/footer.php'; ?>