<?php
if (!session_id()) session_start();
require_once 'Proses.php';

// buat object
$proses = new Proses;

// cek session, apabila sudah ada maka akan diarahkan ke halaman beranda
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] == "Admin") {
        header('Location: includes/admin/');
    } else {
        // kita belum buat
        header('Location: petugas/');
    }
}

// ketika tombol masuk diklik maka jalankan kode berikut
if (isset($_POST['masuk'])) {
    // menghindari sql injection
    $username = $proses->konek->real_escape_string($_POST['username']);
    $password = $proses->konek->real_escape_string(sha1($_POST['password']));

    $masuk = $proses->loginPetugas($username, $password);

    if ($masuk->num_rows > 0) {
        $data = mysqli_fetch_assoc($masuk);

        if ($data['level'] == "Admin") {
            header('Location: includes/admin');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        } else {
            header('Location: petugas');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        }
    } else {
        $_SESSION['error'] = "Username atau password tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#e7008a" fill-opacity="1" d="M0,192L34.3,181.3C68.6,171,137,149,206,154.7C274.3,160,343,192,411,176C480,160,549,96,617,69.3C685.7,43,754,53,823,101.3C891.4,149,960,235,1029,272C1097.1,309,1166,299,1234,256C1302.9,213,1371,139,1406,101.3L1440,64L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path>
</svg>
<body>

    <div class="row">
        <div class="col-8">
            <div class="row py-5 px-5">
                <div class="col-4 ">
                    <h1 class="text-end">Aplikasi Pembayaran SPP</h1>
                </div>
                <div class="gambarne col-4">
                    <img src="assets/kw.svg" alt="" class="" style="width:400px;  ">
                </div>
            </div>
        </div>
        <div class="col-4 py-5 px-5">
            <h2>Silahkan Masuk</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<span style="color:red;">' . $_SESSION['error'] . '</span>';
            }
            ?>
            <form method="post" action="" 5complete="off">
                <div class="username py-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="border border-primary form-control" style="width:300px; border-radius:100px">
                </div>
                <div class="password py-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="border border-danger form-control" style="width:300px; border-radius:100px">
                </div>
                <input type="submit" name="masuk" value="Masuk" class="btn btn-primary mt-3" style="border-radius: 40px;">
            </form>
        </div>
    </div>

</body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#e7008a" fill-opacity="1" d="M0,192L34.3,181.3C68.6,171,137,149,206,154.7C274.3,160,343,192,411,176C480,160,549,96,617,69.3C685.7,43,754,53,823,101.3C891.4,149,960,235,1029,272C1097.1,309,1166,299,1234,256C1302.9,213,1371,139,1406,101.3L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
</svg>
<!-- link js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>