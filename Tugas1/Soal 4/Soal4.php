<!DOCTYPE html>
<html>
<head>
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Pengecekan Grade Nilai Mahasiswa</h2>

    <!-- Form Input Nilai -->
    <form method="post" action="">
        <label for="nilai">Masukkan nilai anda (0 - 100):</label>
        <input type="number" id="nilai" name="nilai" min="0" max="100" required>
        <input type="submit" value="Cek">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai = $_POST['nilai'];

        echo "<hr>";

        // Tentukan grade dengan if-elseif-else
        if ($nilai >= 85) {
            $grade = "A";
        } elseif ($nilai >= 70) {
            $grade = "B";
        } elseif ($nilai >= 55) {
            $grade = "C";
        } elseif ($nilai >= 40) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<h3>Nilai yang kamu dapatkan adalah: $grade</h3>";
    }
    ?>
</body>
</html>
