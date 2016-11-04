<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">

        <h2>Список статей</h2>

        <a href="/admin/article/create" class="addNews"><i class="icon-plus"></i> Добавить статью</a>
        

        <table class="tableNews">
            <tr>
                <th>ID статьи</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Описание</th>
                <th>Картинка</th>
                <th>Редиактировать</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($articleList as $article): ?>
                <tr>
                    <td class="text-center"><?php echo $article['id']; ?></td>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo $article['date']; ?></td>
                    <td><?php echo $article['headtext']; ?></td>  
                    <td><img src="<?php echo Article::getImage($article['id']); ?>"></td>
                    <td class="text-center"><a href="/admin/article/update/<?php echo $article['id']; ?>" title="Редактировать"><i class="icon-pen"></i></a></td>
                    <td class="text-center"><a href="/admin/article/delete/<?php echo $article['id']; ?>" title="Удалить">
                    <i class="icon-trash_can"></i>
                    </a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<?php include ROOT.'/views/layouts/footer_admin.php'; ?>