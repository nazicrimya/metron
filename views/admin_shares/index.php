<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">

        <h2>Список акций</h2>

        <a href="/admin/shares/create" class="addNews"><i class="icon-plus"></i> Добавить акцию</a>
        

        <table class="tableNews">
            <tr>
                <th>ID статьи</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Описание</th>
                <th>Редиактировать</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($sharesList as $article): ?>
                <tr>
                    <td class="text-center"><?php echo $article['id']; ?></td>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo $article['date']; ?></td>
                    <td><?php echo $article['description']; ?></td>  
                    <td class="text-center"><a href="/admin/shares/update/<?php echo $article['id']; ?>" title="Редактировать"><i class="icon-pen"></i></a></td>
                    <td class="text-center"><a href="/admin/shares/delete/<?php echo $article['id']; ?>" title="Удалить">
                    <i class="icon-trash_can"></i>
                    </a></td>
                </tr>
            <?php endforeach; ?>
        </table>


        <h2 class="marMin">Изображения акций слайдера</h2>
        <a href="/admin/shares/plusslide" class="addNews"><i class="icon-plus"></i> Добавить изображение</a>
            <?php foreach ($slides as $slide): ?>
                <a href="/admin/shares/minusslide/<?php echo $slide['id']; ?>"><img src="<?php echo $slide['src']; ?>" class="slideAdmin"></a>
            <?php endforeach; ?>
    </div>

<?php include ROOT.'/views/layouts/footer_admin.php'; ?>