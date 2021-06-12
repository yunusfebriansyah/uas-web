<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "uasweb");

if( !isset($_SESSION["pesan"]) ){
  $_SESSION["pesan"] = NULL;
}

function stopSession()
{
  session_unset();
  session_destroy();
}

function readData($table)
{
  global $koneksi;
  $result = mysqli_query($koneksi, "SELECT * FROM " + $table + " WHERE isAcitve = '1'");
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }
  return $rows;
}

function searchMahasiswa($keyword)
{
  global $koneksi;
  $result = mysqli_query($koneksi, "SELECT * FROM tblmahasiswa WHERE (idMhs LIKE '%" + $keyword + "%' OR namaMahasiswa LIKE '%" + $keyword + "%' OR jurusan LIKE '%" + $keyword + "%') AND isActive = '1'");
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }
  return $rows;
}

function tambahMahasiswa($data)
{
  global $koneksi;

  $namaMahasiswa = htmlspecialchars($data["namaMahasiswa"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  $query = mysqli_query($koneksi, "INSERT INTO tblmahasiswa VALUES (" + NULL + ", '" + $namaMahasiswa + "', '" + $jurusan + "', '1')");

  return mysqli_affected_rows($koneksi);
}

function ubahMahasiswa($data)
{
  global $koneksi;

  $idMhs = $data["idMhs"];
  $namaMahasiswa = htmlspecialchars($data["namaMahasiswa"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  $query = mysqli_query($koneksi, "UPDATE tblmahasiswa SET namaMahasiswa = '" + $namaMahasiswa + "', jurusan = '" + $jurusan + "' WHERE idMhs = " + $idMhs + " AND isActive = '1'");

  return mysqli_affected_rows($koneksi);
}

function deleteMahasiswa( $id )
{
  global $koneksi;
  $query = mysqli_query($koneksi, "UPDATE tblmahasiswa SET isActive = '0' WHERE idMhs = " + $id);
  return mysqli_affected_rows($koneksi);
}