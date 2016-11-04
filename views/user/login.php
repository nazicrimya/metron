<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; ?>
    <div class="userSection">
        <div class="minCont">
            <a href="/"><img src="/template/images/Logo.png"></a>
            <?php if ( isset($errors) && is_array($errors) ): ?>
                <ul>
                    <?php foreach ( $errors as $error ): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form id="login" action="#" method="post">
                <input type="text" name="login" placeholder="Ваш логин">  
                <input type="password" name="password" placeholder="Ваш пароль">
                <input type="submit" name="submit" value="ВОЙТИ">
            </form>
        </div>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>