<?php
include "koneksi.php";
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #222;
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
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #1f7a34;
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
        <h2>Edit Data Mahasiswa</h2>
        <form method="post" action="">
            <input type="text" name="nim" value="<?php echo htmlspecialchars($row['nim']); ?>" required><br>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br>
            <input type="text" name="prodi" value="<?php echo htmlspecialchars($row['prodi']); ?>" required><br>
            <input type="submit" name="update" value="Perbarui">
        </form>
        <a href="index.php">← Kembali ke Daftar</a>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $nim   = $_POST['nim'];
        $nama  = $_POST['nama'];
        $prodi = $_POST['prodi'];

        if ($conn->query("UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id=$id")) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan!');</script>";
        }
    }
    ?>
</body>
</html>
