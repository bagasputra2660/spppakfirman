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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#e7008a" fill-opacity="1" d="M0,32L12.6,69.3C25.3,107,51,181,76,213.3C101.1,245,126,235,152,213.3C176.8,192,202,160,227,144C252.6,128,278,128,303,133.3C328.4,139,354,149,379,176C404.2,203,429,245,455,234.7C480,224,505,160,531,112C555.8,64,581,32,606,32C631.6,32,657,64,682,96C707.4,128,733,160,758,160C783.2,160,808,128,834,117.3C858.9,107,884,117,909,144C934.7,171,960,213,985,192C1010.5,171,1036,85,1061,80C1086.3,75,1112,149,1137,170.7C1162.1,192,1187,160,1213,176C1237.9,192,1263,256,1288,234.7C1313.7,213,1339,107,1364,74.7C1389.5,43,1415,85,1427,106.7L1440,128L1440,0L1427.4,0C1414.7,0,1389,0,1364,0C1338.9,0,1314,0,1288,0C1263.2,0,1238,0,1213,0C1187.4,0,1162,0,1137,0C1111.6,0,1086,0,1061,0C1035.8,0,1011,0,985,0C960,0,935,0,909,0C884.2,0,859,0,834,0C808.4,0,783,0,758,0C732.6,0,707,0,682,0C656.8,0,632,0,606,0C581.1,0,556,0,531,0C505.3,0,480,0,455,0C429.5,0,404,0,379,0C353.7,0,328,0,303,0C277.9,0,253,0,227,0C202.1,0,177,0,152,0C126.3,0,101,0,76,0C50.5,0,25,0,13,0L0,0Z"></path>
</svg>
<body>

    <div class="row">
        <div class="col-8">
            <div class="row py-5 px-5">
                <div class="col-4 ">
                    <h1 class="text-end" style="width:50px; ">Aplikasi Pembayaran SPP</h1>
                </div>
                <div class="col-4 ">
                    <img src="assets/yoi.svg" alt="" class="" style="width:400px;  ">
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
            <label for="username" class="form-label"> username </label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" style="width:300px; border-radius:100px">
                <label for="password" class="form-label"> password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" style="width:300px; border-radius:100px">
                <input type="submit" name="masuk" value="Masuk" class="btn btn-primary mt-3" style="border-radius: 40px;">
            </form>
        </div>
    </div>

</body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#e7008a" fill-opacity="1" d="M0,0L11.4,16C22.9,32,46,64,69,80C91.4,96,114,96,137,85.3C160,75,183,53,206,74.7C228.6,96,251,160,274,160C297.1,160,320,96,343,69.3C365.7,43,389,53,411,90.7C434.3,128,457,192,480,218.7C502.9,245,526,235,549,240C571.4,245,594,267,617,261.3C640,256,663,224,686,186.7C708.6,149,731,107,754,112C777.1,117,800,171,823,213.3C845.7,256,869,288,891,261.3C914.3,235,937,149,960,122.7C982.9,96,1006,128,1029,154.7C1051.4,181,1074,203,1097,218.7C1120,235,1143,245,1166,218.7C1188.6,192,1211,128,1234,117.3C1257.1,107,1280,149,1303,144C1325.7,139,1349,85,1371,74.7C1394.3,64,1417,96,1429,112L1440,128L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"></path>
</svg>
<!-- link js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>