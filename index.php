<?php
define('phoffa_app_status','DEVELOPMENT');
include("base/bootstrap.php");
$app= new \phoffa\core\Application();
$app->fireApp();
?>