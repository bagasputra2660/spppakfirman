<?php

if ($status) {
  $d = $admin->tahunAjaranBaru();

  while ($r = mysqli_fetch_assoc($d)) {
    // print_r($r);

    if ($r['kelas'] == 1 || $r['kelas'] == 2) {
      $nisn = $r['nisn'];
      $nis = $r['nis'];
      $nama = $r['nama_lengkap'];
      $kelas = $r['kelas'] + 1;
      $id_spp = $r['id_spp'];

      if($admin->tambahDataSiswa($nisn, $nis, $nama, $kelas, $id_spp))
      {
        $bulan[] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        for ($i=0; $i < 12; $i++) { 
          $admin->tambahDataPembayaran($nisn, $bulan[0][$i], $id_spp);
        }
        echo "<script>alert('Data tahun ajaran baru berhasil dibuat'); window.location.href = '?p=siswa'</script>";
      }
      else
      {
        echo "<script>alert('Data tahun ajaran baru gagal dibuat'); window.location.href = '?p=siswa'</script>";
      }
    }
  }
}