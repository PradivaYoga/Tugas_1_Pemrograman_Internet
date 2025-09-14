<!DOCTYPE html>
<html>
<head>
    <title>Menu Makanan</title>
</head>
<body>
    <h2>Pilih Menu Makanan</h2>

    <form method="post" action="">
        <label for="menu">Pilih Makanan:</label>
        <select id="menu" name="menu" required>
            <option value="nasi_padang">Nasi Padang</option>
            <option value="bakso">Bakso</option>
            <option value="sate_ayam">Sate Ayam</option>
            <option value="gudeg">Gudeg</option>
            <option value="rawon">Rawon</option>
        </select>
        <input type="submit" value="Lihat Harga">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $menu = $_POST['menu'];
        $harga = 0;

        switch ($menu) {
            case "nasi_padang":
                $harga = 25000;
                $namaMenu = "Nasi Padang";
                break;
            case "bakso":
                $harga = 15000;
                $namaMenu = "Bakso";
                break;
            case "sate_ayam":
                $harga = 20000;
                $namaMenu = "Sate Ayam";
                break;
            case "gudeg":
                $harga = 30000;
                $namaMenu = "Gudeg";
                break;
            case "rawon":
                $harga = 35000;
                $namaMenu = "Rawon";
                break;
            default:
                $namaMenu = "Tidak diketahui";
                $harga = "Tidak tersedia";
        }

        echo "<hr>";
        echo "<h3>$namaMenu → Harga: Rp$harga</h3>";
    }
    ?>
</body>
</html>
