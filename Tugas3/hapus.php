<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Mahasiswa</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .confirm-box {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
            width: 380px;
            text-align: center;
        }
        h3 {
            color: #d9534f;
            margin-bottom: 15px;
        }
        button {
            padding: 10px 18px;
            margin: 8px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #b92b38;
        }
        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }
        .btn-cancel:hover {
            background-color: #555c63;
        }
    </style>
</head>
<body>
    <div class="confirm-box">
        <h3>Yakin ingin menghapus data ini?</h3>
        <form method="post" action="">
            <button type="submit" name="hapus" class="btn-delete">Hapus</button>
            <a href="index.php"><button type="button" class="btn-cancel">Batal</button></a>
        </form>
    </div>

    <?php
    if (isset($_POST['hapus'])) {
        $id = $_GET['id'];
        if ($conn->query("DELETE FROM mahasiswa WHERE id=$id")) {
            echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat menghapus data!');</script>";
        }
    }
    ?>
</body>
</html>
