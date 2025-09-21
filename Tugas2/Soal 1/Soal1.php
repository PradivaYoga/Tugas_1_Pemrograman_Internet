<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang Mahasiswa</title>
</head>
<body>
    <h2>Daftar Barang Mahasiswa</h2>
    <hr></hr>

    <?php
    $barang = [
        "Buku Catatan",
        "Pulpen",
        "Pensil Mekanik",
        "Penghapus",
        "Stabilo",
        "Binder",
        "Laptop",
        "Flashdisk",
        "Botol Minum",
        "Tas Ransel"
    ];

    echo "<ul>";
    foreach ($barang as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>
