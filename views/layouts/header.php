<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $titleMain; ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link href="//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.min.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="/template/css/main.css">
        <link rel="stylesheet" type="text/css" href="/template/css/media-queries.css" >
        <script type="text/javascript" src="/template/js/jquery.panorama_viewer.js"></script>
        <script type="text/javascript" src="/template/js/scroll.js"></script>
        <script type="text/javascript" src="/template/js/scrollspy.js"></script>
        <link rel="stylesheet" type="text/css" href="/template/css/panorama_viewer.css">
        <link rel="stylesheet" type="text/css" href="/template/css/slider.css">
        <link rel="stylesheet" href="/template/css/mfglabs_iconset.css">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <script type="text/javascript" src="/template/js/slider.js"></script>
        <script src="//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>
        
		<script type="text/javascript">
			$(function(){
				$(".panorama").panorama_viewer({
				    repeat: false,
				    direction: "horizontal",
				    animationTime: 700, 
				    easing: "linear",       
				    overlay: false             
			  	});
        </script>
        
        <div class="blurWrap">
        <?php if (isset($isMain)): ?>
            <div class="myPanorama">
                <div class="panorama">
                    <img src="/template/images/panorama.png">
                </div>
                <h1 class="h1Main">Весоизмерительные комплексы</h1>
            </div>
        <?php endif; ?>
        <div id="wrapper">
        
        <div id="sliderIco">
        	АКЦИИ <span><?php echo Shares::getTotalSharesImg().""; ?></span> 
        </div>	
          <div class="phoneCall">
              <form method="post" action="#">
                <input type="text" placeholder="Ваш номер">
                <p><input type="submit" value="ЗВОНОК"></p>
              </form>
          </div>
            <div class="menuRow">
                <a href="/">
                    <div class="logo">
                        <img src="/template/images/Logo.png">
                        <h4>деньги любят точность...</h4>
                    </div>
                    <a class="clickPhone" style="display: block;">
                        <div id="call">
                            <div class="minContainer">
                                <h2>8 (863) 200-37-67</h2>
                                <p>ЗАКАЖИТЕ ЗВОНОК</p>
                            </div>
                        </div>
                    </a>
                  <script type="text/javascript">
                    var clicked = false;
                    $('.clickPhone').click(function() {
                        if (!clicked) {
                          clicked = true;
                          $('.phoneCall').fadeIn();
                        }
                        else {
                          $('.phoneCall').fadeOut();
                          clicked = false;
                        }
                    });
                  </script>
                </a>
                <ul>
                    <?php if(isset($pageNum)): ?>
                        <?php if($pageNum == 2): ?>
                            <a id="autoV"><li class="menu-row">АВТОМОБИЛЬНЫЕ ВЕСЫ</li></a>
                            <a id="modV"><li class="menu-row">МОДЕРНИЗАЦИЯ ВЕСОВ</li></a>
                            <a id="autV"><li class="menu-row">АВТОМАТИЗАЦИЯ</li></a> 
                        <?php elseif($pageNum == 1): ?>
                            <a id="aboutV"><li class="menu-row">О КОМПАНИИ</li></a>
                            <a id="mistV"><li class="menu-row">ПРЕЙМУЩЕСТВА</li></a>
                            <a id="comV"><li class="menu-row">КОМАНДА</li></a> 
                        <?php elseif($pageNum == 3): ?>
                            <a id="fbV"><li class="menu-row">ОТЗЫВЫ</li></a>
                            <a id="parV"><li class="menu-row">ПАРТНЕРЫ</li></a>
                            <a id="photV"><li class="menu-row">ФОТОГАЛЕРЕЯ</li></a> 
                        <?php endif; ?>
                     <?php endif; ?>
                    <li class="menu-row show"><i class="icon-reorder"></i> <?php echo $currentUrl; ?></li>
                    <a href="/search/"><li class="menu-row"><i class="icon-magnifying"></i></li></a>
                </ul>
                
            </div>
            
            <div class="slideMenu">
                <div class="hidden">
                    <div class="container" style="margin: 0;">
                        <div class="hight">
                            <ul>
                                <a id="compLink" href="/command/"><li class="menu-row">О КОМПАНИИ</li></a>
                                <a id="missionLink"><li class="menu-row">МИССИЯ И ЦЕЛИ</li></a>
                                <a id="actLink"><li class="menu-row">ДЕЯТЕЛЬНОСТЬ</li></a>
                                <a id="moreLink"><li class="menu-row">ПРЕИМУЩЕСТВА</li></a>
                                <a id="commandLink"><li class="menu-row">КОМАНДА</li></a>
                            </ul>
                            <ul>
                                <a id="prodLink" href="/"><li class="menu-row">ПРОДУКЦИЯ</li></a>
                                <a id="priceLink"><li class="menu-row">УСЛУГИ И ПРАЙС</li></a>
                                <a id="garantLink"><li class="menu-row">ГАРАНТИЯ</li></a>
                                <a id="licenLink"><li class="menu-row">СЕРТИФИКАТЫ</li></a>
                                <a id="gostLink"><li class="menu-row">ГОСТЫ</li></a>
                            </ul> 
                        </div>
                        <div class="low">
                            <ul class="zero-marg">
                                <a href="/clients/"><li class="menu-row">КЛИЕНТЫ</li></a>
                                <a id="fbLink"><li class="menu-row">ОТЗЫВЫ</li></a>
                                <a id="parthLink"><li class="menu-row">ПАРТНЕРЫ</li></a>
                                <a id="photoLink"><li class="menu-row">ФОТОГАЛЕРЕЯ</li></a>
                                <li></li>
                            </ul>
                            <ul class="zero-marg">
                                <a href="/news/"><li class="menu-row">НОВОСТИ</li></a>
                                <a href="/shares/"><li class="menu-row">АКЦИИ</li></a>
                                <a href="/articles/"><li class="menu-row">СТАТЬИ</li></a>
                                <a href="/vacancies/"><li class="menu-row">ВАКАНСИИ</li></a>
                            </ul> 
                        </div>
                            <a href="#" data-featherlight="#mylightbox" class="subscribe">
                                <label class="boxed">
                                    <input class="checkbox" type="checkbox" name="checkbox-test">
                                    <span class="checkbox-custom"></span>
                                    <span class="label">ПОДПИСАТЬСЯ</span>
                                </label>
                            </a>
                            <div id="mylightbox" class="lightbox">
                                <form method="post" action="#">
                                    <input type="text" placeholder="Email">
                                    <label class="boxed">
                                        <input class="checkbox" type="checkbox" name="checkbox-test">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">НОВОСТИ</span>
                                    </label>
                                    <label class="boxed">
                                        <input class="checkbox" type="checkbox" name="checkbox-test">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">СТАТЬИ</span>
                                    </label>
                                    <label class="boxed">
                                        <input class="checkbox" type="checkbox" name="checkbox-test">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">АКЦИИ</span>
                                    </label>
                                    <label class="boxed">
                                        <input class="checkbox" type="checkbox" name="checkbox-test">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">ВАКАНСИИ</span>
                                    </label>
                                    <p><input type="submit" value="ОБНОВИТЬ"></p>
                                </form>
                            </div>
                    </div>
                </div>
            </div>