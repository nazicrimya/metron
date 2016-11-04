		
                <div class="menuList">
                    <span>
                        ООО «Метрон»<br>
                        ул. Металлургическая, 102/2, <br>
                        офис 607,<br>
                        г. Ростов-на-Дону, 344029, Россия<br>
                        Tel:    +7 (863) 200-37-67<br>
                        Fax:    +7 (863) 219-14-71<br>
                        Email:  info@ltdmetron.com<br><br>

                        © ООО «Метрон», 2007
                    </span>
                </div>
		</div>
		
            </div>
        </div>
                
        <div id="slider" class="slider_wrap">  
            <?php 
	            $sharesimg = array();
				$sharesimg = Shares::getSharesImage();
            ?>   
			<?php foreach ($sharesimg as $shareItem): ?>
				<img src="<?php echo $shareItem['src']; ?>" alt="<?php echo $shareItem['alt']; ?>">
			<?php endforeach; ?>
        </div>
		<script type="text/javascript">
			$(function(){
				$(".panorama").panorama_viewer({
				    repeat: false,
				    direction: "horizontal",
				    animationTime: 700, 
				    easing: "linear",       
				    overlay: false             
			  	});
			  	$(".myPanorama").css({"width": $(".pv-inner").width() + ($(window).width() * 18) / 100});
			    $('.content').css({"height": $('.content .container').height(),
			                          "width": $(window).width()});
			                          
                $('.menuRow .menu-row').click(function() {
                    $('.active').removeClass('active');
                    $(this).addClass('active');
                });
                
			  	var isOpen = false;
			  	var menu = $('.slideMenu');
				$('.show').click(function() {
					if (!isOpen) {
						menu.css({display: "block"});
						isOpen = true;
					}
					else {
						menu.css({display: "none"});
						$(this).removeClass('active');
						isOpen = false;
					}
				});
			});
		</script>
	</body>
</html>