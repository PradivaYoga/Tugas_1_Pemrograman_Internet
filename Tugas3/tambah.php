<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f7f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Mahasiswa</h2>
        <form method="post" action="">
            <input type="number" name="nim" placeholder="Masukkan NIM" required><br>
            <input type="text" name="nama" placeholder="Masukkan Nama" required><br>
            <input type="text" name="prodi" placeholder="Masukkan Program Studi" required><br>
            <input type="submit" name="submit" value="Simpan">
        </form>
        <a href="index.php">← Kembali ke Daftar</a>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $nim   = trim($_POST['nim']);
        $nama  = trim($_POST['nama']);
        $prodi = trim($_POST['prodi']);

        if ($conn->query("INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim', '$nama', '$prodi')")) {
            echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan!');</script>";
        }
    }
    ?>
</body>
</html>
