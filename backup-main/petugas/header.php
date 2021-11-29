<?php
session_start();
require_once 'Petugas.php';

$petugas = new Petugas;

// jika session id belum di set, maka kembalikan ke halaman login
if (!isset($_SESSION['id'])) {
    header('Location: ../');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Petugas</title>
    <!-- boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- boostrap link -->
    <style type="text/css">
        li {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="judul">
                    <b>Aplikasi Pembayaran SPP</b>
                </div>

                <div class="tombol_transaksi">
                    <a class="btn btn-primary my-1 " href="?p=transaksi">Transaksi</a>
                </div>

                <div class="tombol_logout">
                    <a class="btn btn-primary my-1 " href="?p=logout">Logout</a>
                </div>
            </div>
            <div class="col-4"></div>
        </div>


    </div>