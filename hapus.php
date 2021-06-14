<?php
  require "config.php";
    
  if( !isset( $_SESSION["login"] ) ){
    header("Location:index.php");
    exit;
    die;
  }

  $id = $_GET["id"];
  if( deleteMahasiswa($id) > 0 ){
    $_SESSION["pesan"] = ["data" => "mahasiswa", "notif" => "berhasil dihapus", "color" => "primary"];
  }else{
    $_SESSION["pesan"] = ["data" => "mahasiswa", "notif" => "gagal dihapus", "color" => "danger"];
  }
  header("Location:mahasiswa.php");
?>