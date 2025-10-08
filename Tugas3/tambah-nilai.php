<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Nilai Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { background: white; padding: 25px 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 380px; }
        input, select { width: 100%; padding: 8px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { background: #007bff; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #0056b3; }
        .back-link { text-align: center; margin-top: 10px; display: block; color: #007bff; }
    </style>
</head>
<body>
<?php
$mahasiswa_id = isset($_GET['mahasiswa_id']) ? intval($_GET['mahasiswa_id']) : null;
$nama_mahasiswa = "";

// Jika mahasiswa_id ada, ambil datanya
if ($mahasiswa_id) {
    $stmt = $conn->prepare("SELECT nama FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $mahasiswa_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $nama_mahasiswa = $row['nama'];
    } else {
        echo "<script>alert('Mahasiswa tidak ditemukan!'); window.location='index.php';</script>";
        exit;
    }
}
?>

<form method="post" onsubmit="return validateForm()">
    <h2>Tambah Nilai</h2>

    <?php if (!$mahasiswa_id): ?>
        <label>Mahasiswa:</label>
        <select name="mahasiswa_id" required>
            <option value="">-- Pilih Mahasiswa --</option>
            <?php
            $result = $conn->query("SELECT id, nama FROM mahasiswa ORDER BY nama ASC");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nama']}</option>";
            }
            ?>
        </select>
    <?php else: ?>
        <input type="hidden" name="mahasiswa_id" value="<?= $mahasiswa_id ?>">
        <p><strong>Mahasiswa:</strong> <?= htmlspecialchars($nama_mahasiswa) ?></p>
    <?php endif; ?>

    <label>Mata Kuliah:</label>
    <input type="text" name="mata_kuliah" required>

    <label>SKS:</label>
    <input type="number" name="sks" min="1" max="6" required>

    <label>Nilai Huruf:</label>
    <select name="nilai_huruf" id="nilai_huruf" required>
        <option value="">-- Pilih Nilai --</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
    </select>

    <input type="submit" name="submit" value="Simpan">
    <a href="index.php" class="back-link">← Kembali</a>
</form>

<script>
function validateForm() {
    const nilai = document.getElementById("nilai_huruf").value;
    if (!["A","B","C","D","E"].includes(nilai)) {
        alert("Nilai huruf tidak valid!");
        return false;
    }
    return true;
}
</script>

<?php
if (isset($_POST['submit'])) {
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $mata_kuliah  = $_POST['mata_kuliah'];
    $sks          = $_POST['sks'];
    $nilai_huruf  = $_POST['nilai_huruf'];

    $konversi = ["A"=>4.00, "B"=>3.00, "C"=>2.00, "D"=>1.00, "E"=>0.00];
    $nilai_angka = $konversi[$nilai_huruf];

    $stmt = $conn->prepare("INSERT INTO nilai (mahasiswa_id, mata_kuliah, sks, nilai_huruf, nilai_angka) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdsd", $mahasiswa_id, $mata_kuliah, $sks, $nilai_huruf, $nilai_angka);

    if ($stmt->execute()) {
        echo "<script>alert('Data nilai berhasil disimpan!'); window.location='lihat-nilai.php?id=$mahasiswa_id';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan data!');</script>";
    }
}
?>
</body>
</html>
