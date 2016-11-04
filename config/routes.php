<?php 
	return array(
			// Отдел новостей
		'news/([0-9]+)' => 'news/view/$1',
		'news/page-([0-9]+)' => 'news/index/$1',
		'news' => 'news/index/1',

			// Отдел акций
		'shares' => 'shares/index',

			// Отдел вакансий
		'vacancies' => 'vacancies/index',

			// Поиск по сайту
		'search' => 'search/index',
		
			// Отдел статей
		'articles/page-([0-9]+)' => 'article/index/$1',
		'articles/([0-9]+)' => 'article/view/$1',
		'articles' => 'article/index/1',
		
		'clients' => 'client/index',
		'command' => 'command/index',
		'' => 'index/site',
	);
?>
