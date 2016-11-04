<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">
        <h2>Изменение пароля Вашей учетной записи</h2>
        <?php if ( isset($errors) && is_array($errors) ): ?>
            <ul>
                <?php foreach ( $errors as $error ): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php elseif(empty($errors) && isset( $_POST['submit'] )): ?>
            <?php echo "<h3 class='menuFlag'>Поздравляем, ваш пароль был успешно изменен!</h3>"; ?>
        <?php else: ?>
            <h2>Ваш логин: <?php echo $user['login']; ?></h2>
            <form id="reg" action="#" method="post">  
                <input type="password" name="passwordEd" placeholder="Пароль"><br>       
                <input type="password" name="passwordEdRep" placeholder="Повторите пароль"><br>   
                <input type="submit" name="submit" value="ИЗМЕНИТЬ">
            </form>
        <?php endif; ?>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>