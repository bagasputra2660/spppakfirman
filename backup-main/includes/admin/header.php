<?php
session_start();
require_once 'Admin.php';

$admin = new Admin;

// jika session id belum di set, maka kembalikan ke halaman login
if (!isset($_SESSION['id'])) {
    header('Location: ../../');
}

$id = $_SESSION['id'];

$data = $admin->getDataPetugas($id);
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#000b76" fill-opacity="1" d="M0,160L26.7,133.3C53.3,107,107,53,160,69.3C213.3,85,267,171,320,213.3C373.3,256,427,256,480,213.3C533.3,171,587,85,640,74.7C693.3,64,747,128,800,160C853.3,192,907,192,960,208C1013.3,224,1067,256,1120,256C1173.3,256,1227,224,1280,197.3C1333.3,171,1387,149,1413,138.7L1440,128L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
</svg>

<body>
    <div class="container text-center">
        <h1 href="#">Aplikasi Pembayaran SPP</h1>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item px-2">
                            <a class="nav-link btn btn-primary" href="?p=siswa">Data Siswa</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link btn btn-primary" href="?p=petugas">Data Petugas</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link btn btn-primary" href="?p=spp">Data SPP</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link btn btn-danger" href="?p=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>