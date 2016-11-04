<?php $titleMain = "Панель администратора | Метрон"; include ROOT.'/views/layouts/header_admin.php'; include ROOT.'/views/layouts/menu.php'; ?>
    <div class="adminContainer menuFlag">
        <h1 class="helloAdmin">Добрый день, администратор!</h1>
        <p>Это панель администрирования, здесь Вы можете управлять своим контентом на Вашем сайте.</p>
        <p>На этой странице Вы можете:</p>
        <ul class="mainThin">
            <li><a href="/admin/edit/">Поменять пароль от своей учетной записи</a></li>
            <li><a href="/admin/register/">Создать нового администратора</a></li>
            <li><a href="/admin/logout/">Выйти из панели</a></li>
        </ul>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'; ?>