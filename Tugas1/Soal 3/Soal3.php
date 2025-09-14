<!DOCTYPE html>
<html>
<head>
    <title>Bilangan Ganjil/Genap</title>
</head>
<body>
    <h2>Cek Bilangan Ganjil/Genap</h2>

    <form method="post" action="">
        <label for="angka">Masukkan Angka:</label>
        <input type="number" id="angka" name="angka" required>
        <input type="submit" value="Cek">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka = $_POST['angka'];

        echo "<hr>";
        if ($angka % 2 == 0) {
            echo "<h3>Angka $angka adalah Bilangan Genap</h3>";
        } else {
            echo "<h3>Angka $angka adalah Bilangan Ganjil</h3>";
        }
    }
    ?>
</body>
</html>
