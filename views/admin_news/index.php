<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">

        <h2>Список новостей</h2>

        <a href="/admin/news/create" class="addNews"><i class="icon-plus"></i> Добавить новость</a>
        

        <table class="tableNews">
            <tr>
                <th>ID новости</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Описание</th>
                <th>Картинка</th>
                <th>Редиактировать</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($newsList as $news): ?>
                <tr>
                    <td class="text-center"><?php echo $news['id']; ?></td>
                    <td><?php echo $news['title']; ?></td>
                    <td><?php echo $news['date']; ?></td>
                    <td><?php echo $news['short_content']; ?></td>  
                    <td><img src="<?php echo News::getImage($news['id']); ?>"></td>
                    <td class="text-center"><a href="/admin/news/update/<?php echo $news['id']; ?>" title="Редактировать"><i class="icon-pen"></i></a></td>
                    <td class="text-center"><a href="/admin/news/delete/<?php echo $news['id']; ?>" title="Удалить">
                    <i class="icon-trash_can"></i>
                    </a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<?php include ROOT.'/views/layouts/footer_admin.php'; ?>