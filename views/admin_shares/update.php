<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
<div class="adminContainer menuFlag">
    <h3>Изменить статью</h3>

    <br/>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>

    <?php elseif(empty($errors) && isset( $_POST['submit'] )): ?>
        <h2>Ваша статья успешно изменена!</h2>
    <?php endif; ?>
        <form action="#" method="post" id="postNews" enctype="multipart/form-data">
            <h4>Название</h4>
            <input type="text" name="title" placeholder="" value="<?php echo $articles['title']; ?>">
            <br><br><br>
            <h4>Описание</h4>
            <input type="text" name="headtext" placeholder="" value="<?php echo $articles['headtext']; ?>">
            <br><br><br>
            <h4>Изображение</h4>
            <img src="<?php echo $imgUrl; ?>" style="width: 200px;">
            <input type="file" name="image" placeholder="" value="<?php echo $imgUrl; ?>">
            <br><br><br>
            <h4>Текст</h4>
            <textarea name="content"><?php echo $articles['content']; ?></textarea>

            <br/><br/>

            <input type="submit" name="submit" class="addNews" value="Сохранить">

            <br/><br/>
        </form>
</div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>