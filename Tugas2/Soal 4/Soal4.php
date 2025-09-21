<!DOCTYPE html>
<html>
<head>
    <title>Bilangan Genap</title>
</head>
<body>
    <h2>Menampilkan Bilangan Genap</h2>
    <hr>

    <form method="post" action="">
        <label for="awal">Masukkan Angka Awal:</label>
        <input type="number" id="awal" name="awal" required>
        <br><br>

        <label for="akhir">Masukkan Angka Akhir:</label>
        <input type="number" id="akhir" name="akhir" required>
        <br><br>

        <input type="submit" value="Tampilkan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];

        echo "<hr>";
        if ($awal < $akhir) {
            $genap = [];

            for ($i = $awal; $i <= $akhir; $i++) {
                if ($i % 2 == 0) {
                    $genap[] = $i;
                }
            }

            if (!empty($genap)) {
                echo "<p>Bilangan genap dari $awal - $akhir:</p>";
                echo implode(", ", $genap) . ".";
            } else {
                echo "<p>Tidak ada bilangan genap pada rentang ini.</p>";
            }
        } else {
            echo "<p style='color:red;'>Angka awal harus lebih kecil dari angka akhir!</p>";
        }
    }
    ?>
</body>
</html>
