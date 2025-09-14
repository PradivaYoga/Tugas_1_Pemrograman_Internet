<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
</head>
<body>
    <h2>Kalkulator</h2>

    <form method="post" action="Soal2.php">
        <label for="angka1">Angka 1:</label>
        <input type="number" id="angka1" name="angka1" required>
        <br><br>

        <label for="angka2">Angka 2:</label>
        <input type="number" id="angka2" name="angka2" required>
        <br><br>

        <label for="operator">Operator:</label>
        <select id="operator" name="operator" required>
            <option value="tambah">Tambah (+)</option>
            <option value="kurang">Kurang (-)</option>
            <option value="kali">Kali (×)</option>
            <option value="bagi">Bagi (÷)</option>
        </select>
        <br><br>

        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operator = $_POST['operator'];
        $hasil = 0;
        $simbol = "";

        switch ($operator) {
            case "tambah":
                $hasil = $angka1 + $angka2;
                $simbol = "+";
                break;
            case "kurang":
                $hasil = $angka1 - $angka2;
                $simbol = "-";
                break;
            case "kali":
                $hasil = $angka1 * $angka2;
                $simbol = "×";
                break;
            case "bagi":
                if ($angka2 != 0) {
                    $hasil = $angka1 / $angka2;
                    $simbol = "÷";
                } else {
                    $hasil = "$angka1 Tidak bisa dibagi 0!";
                    $simbol = "÷";
                }
                break;
            default:
                $hasil = "Operator tidak valid!";
        }

        echo "<hr>";
        echo "<h3>Hasil pengoperasian $angka1 $simbol $angka2 = $hasil</h3>";
    }
    ?>
</body>
</html>
