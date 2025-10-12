<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama = $email = $nomor = $film = $jumlah = "";
$namaErr = $emailErr = $nomorErr = $filmErr = $jumlahErr = "";


// **********************  2  **************************
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
    // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai

    $nama = trim($_POST["nama"]);
    if(empty($nama)){
      $namaErr = "Nama Wajib Diisi";
    }

    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai

    $email = trim($_POST["email"]);
    if (empty($email)){
      $emailErr = "Email Wajib Diisi";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL )){
      $emailErr = "Format Email Tidak Sesuai";
    }


    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai

    $nomor = trim($_POST["nomor"]);
    if (empty($nomor)){
      $nomorErr = "Nomor Wajib Diisi";
    }
    elseif(ctype_digit($nomor)){
      $nomorErr = "Format Nomor Tidak Sesuai";
    }

    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai

    $film = trim($_POST["film"] ?? "");
    if (empty($film)){
      $filmErr = "Silahkan Pilih Film";
    }

    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai

    $tiket = trim($_POST["jumlah"]);
    if (empty($jumlah)){
      $jumlahErr = "Masukan Jumlah Tiket";
    }
    elseif(ctype_digit($jumlah)){
      $jumlah = "Jumlah harus berupa angka";
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <!-- **********************  8  **************************
       Tambahkan nilai atribut di dalam src dengan nama file gambar logo bioskop
  -->
  <img src="EAD.png" alt="Logo Bioskop EAD" class="logo">

<h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="" >
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr ? "* $namaErr" : "" ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">.<?php echo $emailErr ? "* $emailErr" : "" ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nomor HP:</label>
    <input type="text" name="nomor" value="<?php echo $nomor; ?>">
    <span class="error"><?php echo $nomorErr ? "* $nomorErr" : "" ?></span>

    <label>Pilih Film:</label>
    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar"<?php echo ($film == "Interstellar") ? "selected" : ""; ?> ">Interstellar</option>
      <option value="Inception"<?php echo ($film =="Inception") ? "selected" : ""; ?> ">Inception</option>
      <option value="Oppenheimer"<?php echo ($film == "Oppenheimer") ? "selected" : ""; ?> ">Oppenheimer</option>
      <option value="Avengers: Endgame"<?php echo ($film =="Avengers: Endgame") ? "selected" : ""; ?>">Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $filmErr ? "* $filmErr" : "" ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Jumlah Tiket:</label>
    <input type="text" name="jumlah" value="<?php echo $jumlah; ?>">
    <span class="error"><?php echo $jumlahErr ? " * $jumlahErr" : "" ?></span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
  <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorErr && !$filmErr && !$tiketErr )?> 
  <div class="container">
      <h3>Data Pemesanan</h3>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th widht="15%">Nama</th>
            <th widht="15%">Email</th>
            <th widht="15%">Nomor</th>
            <th widht="15%">Film</th>
            <th widht="20%">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $nama;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $nomor;?></td>
            <td><?php echo $film;?></td>
            <td><?php echo $tiket;?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>a
</body>
</html>
