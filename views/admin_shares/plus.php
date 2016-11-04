<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">            
        <h4>Добавление нового слайда</h4>
	    <?php if(empty($errors) && isset( $_POST['submit'] )): ?>
	        <h2>Ваша слайд был успешно добавлен!</h2>
	    <?php endif; ?>

        <form action="#" method="post" id="postNews" enctype="multipart/form-data">
            <h4>Изображение</h4>
            <input type="file" name="slide" placeholder="" value="">
            <br><br>
            <input type="submit" name="submit" class="addNews" value="Сохранить">

            <br/><br/>
        </form>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>