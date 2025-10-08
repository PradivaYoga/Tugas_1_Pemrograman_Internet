<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    die("<h3>⚠️ ID mahasiswa tidak ditemukan.</h3><a href='index.php'>← Kembali</a>");
}

$id = $_GET['id'];

// Ambil data mahasiswa
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$mahasiswa = $stmt->get_result()->fetch_assoc();

if (!$mahasiswa) {
    die("<h3>⚠️ Mahasiswa tidak ditemukan.</h3><a href='index.php'>← Kembali</a>");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nilai Mahasiswa - <?= htmlspecialchars($mahasiswa['nama']) ?></title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .info {
            background: #fff;
            width: 60%;
            margin: 10px auto;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .info p {
            margin: 6px 0;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 14px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            color: #777;
            font-style: italic;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn-container a {
            background: #007BFF;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            margin: 0 6px;
            display: inline-block;
            transition: 0.3s;
        }
        .btn-container a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Daftar Nilai Mahasiswa</h2>

    <div class="info">
        <p><strong>Nama:</strong> <?= htmlspecialchars($mahasiswa['nama']) ?></p>
        <p><strong>NIM:</strong> <?= htmlspecialchars($mahasiswa['nim']) ?></p>
        <p><strong>Program Studi:</strong> <?= htmlspecialchars($mahasiswa['prodi']) ?></p>
    </div>

    <?php
    $stmt = $conn->prepare("SELECT * FROM nilai WHERE mahasiswa_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai Huruf</th>
                    <th>Nilai Angka</th>
                    <th>Aksi</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['mata_kuliah']}</td>
                    <td>{$row['sks']}</td>
                    <td>{$row['nilai_huruf']}</td>
                    <td>{$row['nilai_angka']}</td>
                    <td>
                        <a href='edit-nilai.php?id={$row['id']}'>Edit</a> | 
                        <a href='hapus-nilai.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus nilai ini?\")'>Hapus</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-data'>Mahasiswa ini belum memiliki data nilai.</p>";
    }
    ?>

    <div class="btn-container">
        <a href="tambah-nilai.php?mahasiswa_id=<?= $id ?>">+ Tambah Nilai</a>
        <a href="index.php">← Kembali ke Daftar Mahasiswa</a>
    </div>
</body>
</html>
