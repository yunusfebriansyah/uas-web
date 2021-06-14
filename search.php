<?php
  require "config.php";
    
  if( !isset( $_SESSION["login"] )  &&  $_SESSION["login"] === NULL ){
    header("Location:index.php");
    exit;
    die;
  }

  $keyword = $_GET["key"];
  $data = searchMahasiswa($keyword);
  foreach ( $data as $row ) :
?>
  <tr>
    <td>
      <?= $row["namaMahasiswa"]; ?>
    </td>
    <td class="text-right">
      <a href="detail.php?id=<?= $row["idMhs"]; ?>" class="badge badge-primary">detail</a>
      <a href="ubah.php?id=<?= $row["idMhs"]; ?>" class="badge badge-success">ubah</a>
      <a onclick="return confirm('Yakin ingin menghapus data??')" href="hapus.php?id=<?= $row["idMhs"]; ?>" class="badge badge-danger">hapus</a>
    </td>
  </tr>
<?php endforeach; ?>