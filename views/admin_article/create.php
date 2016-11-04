<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
<div class="adminContainer menuFlag">
    <h3>Добавить новую статью</h3>

    <br/>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>

    <?php elseif(empty($errors) && isset( $_POST['submit'] )): ?>
        <h2>Ваша статья успешно добавлена!</h2>
    <?php endif; ?>
        <form action="#" method="post" id="postNews" enctype="multipart/form-data">
            <h4>Название</h4>
            <input type="text" name="title" placeholder="" value="">
            <br><br><br>
            <h4>Описание</h4>
            <input type="text" name="headtext" placeholder="" value="">
            <br><br><br>
            <h4>Изображение</h4>
            <input type="file" name="image" placeholder="" value="">
            <br><br><br>
            <h4>Текст</h4>
            <textarea name="content"></textarea>

            <br/><br/>

            <input type="submit" name="submit" class="addNews" value="Сохранить">

            <br/><br/>
        </form>
</div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>