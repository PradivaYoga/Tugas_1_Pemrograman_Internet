<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa Fakultas Teknik</h2>
    <hr>

    <?php
    $mahasiswa = [
        ["NIM" => "210555101", "Nama" => "I Gede Pratama", "Umur" => 20, "Prodi" => "Teknik Lingkungan"],
        ["NIM" => "210555102", "Nama" => "Ni Kadek Ayu Lestari", "Umur" => 21, "Prodi" => "Teknik Sipil"],
        ["NIM" => "210555103", "Nama" => "Gede Pasek Adi", "Umur" => 20, "Prodi" => "Teknik Elektro"],
        ["NIM" => "210555104", "Nama" => "Ni Wayan Sari Dewi", "Umur" => 20, "Prodi" => "Teknik Arsitektur"],
        ["NIM" => "210555105", "Nama" => "I Ketut Adi Nugraha", "Umur" => 20, "Prodi" => "Teknologi Informasi"],
        ["NIM" => "210555106", "Nama" => "Ni Komang Ayu Maharani", "Umur" => 20, "Prodi" => "Teknik Mesin"],
        ["NIM" => "210555107", "Nama" => "I Nyoman Surya", "Umur" => 19, "Prodi" => "Teknik Industri"],
        ["NIM" => "210555108", "Nama" => "Ni Putu Diah Anggraini", "Umur" => 21, "Prodi" => "Teknologi Informasi"],
        ["NIM" => "210555109", "Nama" => "I Gusti Ngurah Pramana", "Umur" => 20, "Prodi" => "Teknik Elektro"],
        ["NIM" => "210555110", "Nama" => "Ni Luh Ayu Puspita", "Umur" => 20, "Prodi" => "Teknik Sipil"]
    ];

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>NIM</th><th>Nama</th><th>Umur</th><th>Prodi</th></tr>";

    foreach ($mahasiswa as $mhs) {
        echo "<tr>";
        echo "<td>{$mhs['NIM']}</td>";
        echo "<td>{$mhs['Nama']}</td>";
        echo "<td>{$mhs['Umur']}</td>";
        echo "<td>{$mhs['Prodi']}</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
