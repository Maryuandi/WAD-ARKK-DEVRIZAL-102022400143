<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // **********************  1  **************************
  // Tangkap nilai nama dari form
  $nama = $_POST["nama"];
  if ($nama == "") {
    $namaErr = "Harap isi nama lengkap anda!";
  }

  // **********************  2  **************************
  // Tangkap nilai email dari form
  $email = $_POST["email"];
  if ($email == "") {
    $emailErr = "Harap isi email anda!";
  } elseif (!strpos($email, "@")) {
    $emailErr = "Harap isi dengan format yang benar!";
  }

  // **********************  3  **************************
  // Tangkap nilai NIM dari form
  $nim = $_POST["nim"];
  if ($nim == "") {
    $nimErr = "Harap isi NIM anda!";
  } elseif (!is_numeric($nim)) {
    $nimErr = "NIM harus berupa angka";
  }

  // **********************  4  **************************
  // Tangkap nilai jurusan (dropdown)
  $jurusan = $_POST["jurusan"];
  if ($jurusan == "") {
    $jurusanErr = "Harap isi Jurusan kamu";
  }

  // **********************  5  **************************
  // Tangkap nilai alasan (textarea)
  $alasan = $_POST["alasan"];
  if ($alasan == "") {
    $alasanErr = "Harap isi alasan anda!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .error { color: #d00; font-size: .9rem; }
    .success { color: #067a06; margin: 12px 0; }
    .form-container { max-width: 560px; margin: auto; }
    table { border-collapse: collapse; margin-top: 10px; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    .logo { max-width: 120px; margin: 8px 0; display: block; }
    input, textarea, select, button { display: block; width: 100%; margin-bottom: 10px; padding: 6px; }
  </style>
</head>
<body>
  <div class="form-container">
    <img src="EAD.png" alt="Logo EAD" class="logo">
    <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>

    <form method="post" action="">
      <label>Nama:</label>
      <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
      <span class="error"><?php echo $namaErr; ?></span>

      <label>Email:</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
      <span class="error"><?php echo $emailErr; ?></span>

      <label>NIM:</label>
      <input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
      <span class="error"><?php echo $nimErr; ?></span>

      <label>Jurusan:</label>
      <select name="jurusan">
        <option value="">-- Pilih Jurusan --</option>
        <option value="Sistem Informasi" <?php if ($jurusan === "Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
        <option value="Informatika" <?php if ($jurusan === "Informatika") echo "selected"; ?>>Informatika</option>
        <option value="Teknik Industri" <?php if ($jurusan === "Teknik Industri") echo "selected"; ?>>Teknik Industri</option>
      </select>
      <span class="error"><?php echo $jurusanErr; ?></span>

      <label>Alasan Bergabung:</label>
      <textarea name="alasan"><?php echo htmlspecialchars($alasan); ?></textarea>
      <span class="error"><?php echo $alasanErr; ?></span>

      <button type="submit">Daftar</button>
    </form>

    <?php
// **********************  6  **************************
// Tampilkan hasil input dalam tabel + logo di atasnya jika semua valid
if (
  $_SERVER["REQUEST_METHOD"] === "POST" &&
  !$namaErr && !$emailErr && !$nimErr && !$jurusanErr && !$alasanErr
):
?>
  <div class="hasil-container">
    <img src="EAD.png" alt="Logo EAD" class="hasil-logo">
    <h3>Data Pendaftaran Berhasil</h3>
    <table>
      <tr><th>Nama</th><td>: <?php echo htmlspecialchars($nama); ?></td></tr>
      <tr><th>Email</th><td>: <?php echo htmlspecialchars($email); ?></td></tr>
      <tr><th>NIM</th><td>: <?php echo htmlspecialchars($nim); ?></td></tr>
      <tr><th>Jurusan</th><td>: <?php echo htmlspecialchars($jurusan); ?></td></tr>
      <tr><th>Alasan Bergabung</th><td>: <?php echo nl2br(htmlspecialchars($alasan)); ?></td></tr>
    </table>
  </div>
<?php endif; ?>
  </div>
</body>
</html>
