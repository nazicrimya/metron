<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">            
        <h4>Удалить слайд #<?php echo $id; ?></h4>

        <p>Вы действительно хотите удалить этот слайд??</p>

        <form method="post">
            <input type="submit" name="submit" value="УДАЛИТЬ" class="addNews">
        </form>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>