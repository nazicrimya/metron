<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">
        <h2>Создание новой учетной записи администратора</h2>
        <?php if ( isset($errors) && is_array($errors) ): ?>
            <ul>
                <?php foreach ( $errors as $error ): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php elseif(empty($errors) && isset( $_POST['submit'] )): ?>
            <?php echo "<h3 class='menuFlag'>Поздравляем, пользователь успешно зарегестрирован</h3>"; ?>
        <?php else: ?>
            <form id="reg" action="#" method="post">
                <input type="text" name="loginReg" placeholder="Логин" autocomplete="off">  <br>     
                <input type="password" name="passwordReg" placeholder="Пароль"><br>   
                <input type="submit" name="submit" value="ЗАРЕГЕСТРИРОВАТЬ">
            </form>
        <?php endif; ?>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>