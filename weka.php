<?php
  require_once 'config.php';
  $action = $_REQUEST['action'];
  $noui = $_REQUEST['noui'];
  if(!$noui) require_once 'req/header.php';
  require_once "inc/$action.php";
  if(!$noui) require_once 'req/footer.php';
?>
