<?php
include "koneksi.php";

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

$sql = "SELECT * FROM mahasiswa 
        WHERE nama LIKE '%$keyword%' 
           OR nim LIKE '%$keyword%' 
           OR prodi LIKE '%$keyword%' 
        ORDER BY id ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='show' border='1' cellpadding='8' cellspacing='0' width='80%' align='center'>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['prodi']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='no-data'>Tidak ada hasil ditemukan.</p>";
}
?>
