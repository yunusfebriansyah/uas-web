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

function readData()
{
  global $koneksi;
  $result = mysqli_query($koneksi, "SELECT * FROM tblmahasiswa WHERE isActive = '1'");
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }
  return $rows;
}

function detailData( $id )
{
  global $koneksi;
  $result = mysqli_query($koneksi, "SELECT * FROM tblmahasiswa WHERE idMhs = $id AND isActive = '1'");
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }
  return $rows[0];
}

function searchMahasiswa($keyword)
{
  global $koneksi;
  $result = mysqli_query($koneksi, "SELECT * FROM tblmahasiswa WHERE isActive = '1' AND (idMhs LIKE '%$keyword%' OR npmMhs LIKE '%$keyword%' OR namaMahasiswa LIKE '%$keyword%' OR jurusan LIKE '%$keyword%')");
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }
  return $rows;
}

function tambahMahasiswa($data)
{
  global $koneksi;

  $npmMhs = htmlspecialchars($data["npmMhs"]);
  $namaMahasiswa = htmlspecialchars($data["namaMahasiswa"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  $query = mysqli_query($koneksi, "INSERT INTO tblmahasiswa VALUES(NULL, '$npmMhs', '$namaMahasiswa', '$jurusan', '1')");

  return mysqli_affected_rows($koneksi);
}

function ubahMahasiswa($data)
{
  global $koneksi;

  $idMhs = $data["idMhs"];
  $npmMhs = htmlspecialchars($data["npmMhs"]);
  $namaMahasiswa = htmlspecialchars($data["namaMahasiswa"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  $query = mysqli_query($koneksi, "UPDATE tblmahasiswa SET npmMhs = '$npmMhs', namaMahasiswa = '$namaMahasiswa', jurusan = '$jurusan' WHERE idMhs = $idMhs AND isActive = '1'");

  return mysqli_affected_rows($koneksi);
}

function deleteMahasiswa( $id )
{
  global $koneksi;
  $query = mysqli_query($koneksi, "UPDATE tblmahasiswa SET isActive = '0' WHERE idMhs = $id");
  return mysqli_affected_rows($koneksi);
}