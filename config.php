<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "uasweb");

if( !isset($_SESSION["pesan"]) ){
  $_SESSION["pesan"] = NULL;
}

function stopSession()
{
  $_SESSION["pesan"] = NULL;
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

  mysqli_query($koneksi, "INSERT INTO tblmahasiswa VALUES(NULL, '$npmMhs', '$namaMahasiswa', '$jurusan', '1')");

  return mysqli_affected_rows($koneksi);
}

function ubahMahasiswa($data)
{
  global $koneksi;

  $idMhs = $data["idMhs"];
  $npmMhs = htmlspecialchars($data["npmMhs"]);
  $namaMahasiswa = htmlspecialchars($data["namaMahasiswa"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  mysqli_query($koneksi, "UPDATE tblmahasiswa SET npmMhs = '$npmMhs', namaMahasiswa = '$namaMahasiswa', jurusan = '$jurusan' WHERE idMhs = $idMhs AND isActive = '1'");

  return mysqli_affected_rows($koneksi);
}

function deleteMahasiswa( $id )
{
  global $koneksi;
  mysqli_query($koneksi, "UPDATE tblmahasiswa SET isActive = '0' WHERE idMhs = $id");
  return mysqli_affected_rows($koneksi);
}

function daftar( $data )
{
  global $koneksi;
  $nama = htmlspecialchars($data["nama"]);
  $username = htmlspecialchars($data["username"]);
  $password =  password_hash($data["password"], PASSWORD_DEFAULT);
  $result = mysqli_query($koneksi, "SELECT * FROM tbluser WHERE username = '$username'");
  if( mysqli_num_rows($result) === 0 ){
    mysqli_query($koneksi, "INSERT INTO tbluser VALUES(NULL, '$nama', '$username', '$password', '1')");
    return mysqli_affected_rows($koneksi);
  }else{
    return 0;
  }
}

function login( $data )
{
  global $koneksi;
  $username = htmlspecialchars($data["username"]);
  $password = $data["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM tbluser WHERE username = '$username'");
  if( mysqli_num_rows($result) === 1 ){

    $row = mysqli_fetch_assoc($result);
    if( password_verify( $password, $row["password"] ) ){
      $_SESSION["login"] = ["idUser" => $row["idUser"], "namaUser" => $row["namaUser"] ];
      return 1;
    }else{
      return 0;
    }

  }else{
    return 0;
  }
  
}