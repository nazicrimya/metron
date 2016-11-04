<?php

class CommandController
{
    public function actionIndex() {
        require_once(ROOT . '/views/site/command.php');
        return true;
    }

}