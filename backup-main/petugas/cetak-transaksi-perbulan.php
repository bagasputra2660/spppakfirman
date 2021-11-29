<?php
session_start();
require_once 'Petugas.php';

if (!isset($_SESSION['id'])) {
    header('Location: ../');
}

$petugas = new Petugas;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Transaksi Perbulan</title>
</head>
<body>
    <h3>Laporan Pembayaran SPP</h3><br>
    <hr>

    <?php
    $dt_siswa = $petugas->getDataSiswaByNIS($_GET['nis']);

    var_dump($dt_siswa);
    ?>
</body>
</html>