<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa dengan Status Kelulusan</h2>
    <hr>

    <?php
    $mahasiswa = [
        ["NIM" => "210555101", "Nama" => "I Gede Pratama", "Umur" => 20, "Prodi" => "Teknik Lingkungan", "Nilai" => 85],
        ["NIM" => "210555102", "Nama" => "Ni Kadek Ayu Lestari", "Umur" => 21, "Prodi" => "Teknik Sipil", "Nilai" => 68],
        ["NIM" => "210555103", "Nama" => "Gede Pasek Adi", "Umur" => 20, "Prodi" => "Teknik Elektro", "Nilai" => 90],
        ["NIM" => "210555104", "Nama" => "Ni Wayan Sari Dewi", "Umur" => 20, "Prodi" => "Teknik Arsitektur", "Nilai" => 55],
        ["NIM" => "210555105", "Nama" => "I Ketut Adi Nugraha", "Umur" => 20, "Prodi" => "Teknologi Informasi", "Nilai" => 73],
        ["NIM" => "210555106", "Nama" => "Ni Komang Ayu Maharani", "Umur" => 20, "Prodi" => "Teknik Mesin", "Nilai" => 62],
        ["NIM" => "210555107", "Nama" => "I Nyoman Surya", "Umur" => 19, "Prodi" => "Teknik Industri", "Nilai" => 88],
        ["NIM" => "210555108", "Nama" => "Ni Putu Diah Anggraini", "Umur" => 21, "Prodi" => "Teknologi Informasi", "Nilai" => 45],
        ["NIM" => "210555109", "Nama" => "I Gusti Ngurah Pramana", "Umur" => 20, "Prodi" => "Teknik Elektro", "Nilai" => 77],
        ["NIM" => "210555110", "Nama" => "Ni Luh Ayu Puspita", "Umur" => 20, "Prodi" => "Teknik Sipil", "Nilai" => 95]
    ];

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>NIM</th><th>Nama</th><th>Umur</th><th>Prodi</th><th>Nilai</th><th>Status</th></tr>";

    foreach ($mahasiswa as $mhs) {
        $status = ($mhs['Nilai'] >= 70) ? "Lulus" : "Tidak Lulus";
        echo "<tr>";
        echo "<td>{$mhs['NIM']}</td>";
        echo "<td>{$mhs['Nama']}</td>";
        echo "<td>{$mhs['Umur']}</td>";
        echo "<td>{$mhs['Prodi']}</td>";
        echo "<td>{$mhs['Nilai']}</td>";
        echo "<td>$status</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
