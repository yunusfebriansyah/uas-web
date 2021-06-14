<?php
  require "config.php";
  
  if( !isset( $_SESSION["login"] )  &&  $_SESSION["login"] === NULL ){
    header("Location:index.php");
    exit;
    die;
  }
  
  $_SESSION["login"] = NULL;
  $_SESSION["pesan"] = NULL;
  // session_unset();
  // session_destroy();

  $_SESSION["pesan"] = ["data" => "Kamu", "notif" => "berhasil logout", "color" => "success"];
  header("Location:index.php");
  exit;
  die;