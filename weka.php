<?php
  require_once 'config.php';
  $action = $_REQUEST['action'];
  require_once "inc/$action.php";
?>
