<!DOCTYPE html>
<html>
<head>
    <title>Daftar Harga Barang</title>
</head>
<body>
    <h2>Daftar Harga Barang</h2>
    <hr>

    <?php
    $harga_barang = [
        "Buku Catatan" => 15000,
        "Pulpen" => 5000,
        "Penghapus" => 3000,
        "Pensil" => 4000,
        "Stabilo" => 10000
    ];

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nama Barang</th><th>Harga (Rp)</th></tr>";

    foreach ($harga_barang as $barang => $harga) {
        echo "<tr>";
        echo "<td>$barang</td>";
        echo "<td>Rp " . number_format($harga, 0, ',', '.') . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
