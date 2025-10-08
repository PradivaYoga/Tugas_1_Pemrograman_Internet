<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; text-align: center; }
        table { width: 85%; margin: 20px auto; border-collapse: collapse; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background: #007bff; color: white; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h2>Daftar Nilai Mahasiswa</h2>
    <a href="tambah-nilai.php">+ Tambah Nilai</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Mahasiswa</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai Huruf</th>
            <th>Nilai Angka</th>
            <th>Aksi</th>
        </tr>

        <?php
        $sql = "SELECT nilai.id, mahasiswa.nama, nilai.mata_kuliah, nilai.sks, nilai.nilai_huruf, nilai.nilai_angka
                FROM nilai
                JOIN mahasiswa ON nilai.mahasiswa_id = mahasiswa.id
                ORDER BY mahasiswa.nama ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['mata_kuliah']}</td>
                        <td>{$row['sks']}</td>
                        <td>{$row['nilai_huruf']}</td>
                        <td>{$row['nilai_angka']}</td>
                        <td>
                            <a href='edit-nilai.php?id={$row['id']}'>Edit</a> |
                            <a href='hapus-nilai.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Belum ada data nilai.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
