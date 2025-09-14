<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata Singkat</title>
</head>
<body>
    <h2>Form Biodata Singkat</h2>

    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <br><br>

        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" min="1" required>
        <br><br>

        <label>Jenis Kelamin:</label>
        <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
        <input type="radio" name="gender" value="Perempuan" required> Perempuan
        <br><br>

        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="telepon">Nomor Telepon:</label>
        <input type="text" id="telepon" name="telepon" required>
        <br><br>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" rows="3" cols="30" required></textarea>
        <br><br>

        <input type="submit" value="Tampilkan Biodata">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $gender = $_POST['gender'];
        $pekerjaan = $_POST['pekerjaan'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];

        echo "<hr>";
        echo "<p style='font-size:16px; line-height:1.6; background:#f9f9f9; padding:15px; border-radius:8px;'>";
        echo "Halo, nama saya <strong>$nama</strong>. Umur saya <strong>$umur</strong> tahun. ";
        echo "Saya seorang $gender dan bekerja sebagai <strong>$pekerjaan</strong>. ";
        echo "Anda dapat menghubungi saya melalui email di <strong>$email</strong> atau nomor telepon <strong>$telepon</strong>. ";
        echo "Saat ini, saya tinggal di <strong>$alamat</strong>.";
        echo "</p>";
    }
    ?>
</body>
</html>
