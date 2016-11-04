<?php

class ClientController
{
    public function actionIndex() {
        require_once(ROOT . '/views/site/clients.php');
        return true;
    }

}