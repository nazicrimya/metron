<?php $titleMain = "Поиск | Метрон"; $currentUrl = "ПОИСК"; include ROOT.'/views/layouts/header.php'; ?>
	<div class="container">
		<div>
			<form method="post" action="sr.php" id="formSearch">
			    <input type="text" name="search" id="search_box" class='search_box mar-left' placeholder="Поиск">
			    <input type="submit" value="Поиск" class="search_button"><br>
			</form>
		</div>
		<div>
			<div id="searchresults">
				<h1 class="headOfTitle text-left mar-left">Результаты для <span class="word"></span></h1>
			</div>
			<ul id="results" class="update">
			</ul>
		</div>
	</div>

	<script type="text/javascript">
		$(function() {
		    $(".search_button").click(function() {
		        var searchString    = $("#search_box").val();
		        var data            = 'search='+ searchString;

		        if(searchString) {
		            $.ajax({
		                type: "POST",
		                url: "/views/search/sr.php",
		                data: data,
		                beforeSend: function(html) { // запустится до вызова запроса
		                    $("#results").html('');
		                    $("#searchresults").show();
		                    $(".word").html(searchString);
		               },
		               success: function(html){ // запустится после получения результатов
		                    $("#results").show();
		                    $("#results").append(html);
		              }
		            });
		        }
		        return false;
		    });
		});
	</script>

<?php include ROOT.'/views/layouts/footer.php'; ?>