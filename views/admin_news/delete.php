<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">            
        <h4>Удалить новость <a href="/news/<?php echo $id; ?>">#<?php echo $id; ?></a></h4>

        <p>Вы действительно хотите удалить эту новость?</p>

        <form method="post">
            <input type="submit" name="submit" value="УДАЛИТЬ" class="addNews">
        </form>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>