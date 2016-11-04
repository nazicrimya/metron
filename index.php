<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();

    define('ROOT', dirname(__FILE__));
    
    require_once(ROOT.'/components/router.php');
    require_once(ROOT.'/components/db.php');
    require_once(ROOT.'/components/Autoload.php');
    $rout = new router();
    $rout->run();
?>