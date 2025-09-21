<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <hr></hr>

    <?php
    $mahasiswa = [
        "210555101" => "I Gede Pratama",
        "210555102" => "Ni Kadek Ayu Lestari",
        "210555103" => "Gede Pasek Adi",
        "210555104" => "Ni Wayan Sari Dewi",
        "210555105" => "I Ketut Adi Nugraha",
        "210555106" => "Ni Komang Ayu Maharani",
        "210555107" => "I Nyoman Surya"
    ];

    echo "<ul>";
    foreach ($mahasiswa as $nim => $nama) {
        echo "<li>NIM: $nim - Nama: $nama</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>
