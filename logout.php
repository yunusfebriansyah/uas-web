<?php
  require "config.php";
  
  if( !isset( $_SESSION["login"] ) ){
    header("Location:index.php");
    exit;
    die;
  }
  
  $_SESSION["login"] = NULL;
  session_unset();
  session_destroy();

  $_SESSION["pesan"] = ["data" => "Kamu", "notif" => "berhasil daftar", "color" => "success"];
  header("Location:index.php");
  exit;
  die;