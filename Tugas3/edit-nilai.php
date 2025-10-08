<?php
include "koneksi.php";

$id = $_GET['id']; // id nilai
$result = $conn->prepare("SELECT * FROM nilai WHERE id = ?");
$result->bind_param("i", $id);
$result->execute();
$data = $result->get_result()->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data nilai tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

$mahasiswa_id = $data['mahasiswa_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Nilai Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { background: white; padding: 25px 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 400px; }
        input, select { width: 100%; padding: 8px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { background: #007bff; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #0056b3; }
        .back-link { text-align: center; margin-top: 10px; display: block; color: #007bff; }
    </style>
</head>
<body>
<form method="post" onsubmit="return validateForm()">
    <h2>Edit Nilai</h2>

    <label>Mata Kuliah:</label>
    <input type="text" name="mata_kuliah" value="<?= htmlspecialchars($data['mata_kuliah']) ?>" required>

    <label>SKS:</label>
    <input type="number" name="sks" min="1" max="6" value="<?= htmlspecialchars($data['sks']) ?>" required>

    <label>Nilai Huruf:</label>
    <select name="nilai_huruf" id="nilai_huruf" required>
        <?php
        $huruf = ['A','B','C','D','E'];
        foreach ($huruf as $h) {
            $selected = ($data['nilai_huruf'] == $h) ? "selected" : "";
            echo "<option value='$h' $selected>$h</option>";
        }
        ?>
    </select>

    <input type="submit" name="update" value="Perbarui">
    <a href="lihat-nilai.php?id=<?= $mahasiswa_id ?>" class="back-link">← Kembali</a>
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
if (isset($_POST['update'])) {
    $mata_kuliah  = $_POST['mata_kuliah'];
    $sks          = $_POST['sks'];
    $nilai_huruf  = $_POST['nilai_huruf'];
    $konversi     = ["A"=>4.00, "B"=>3.00, "C"=>2.00, "D"=>1.00, "E"=>0.00];
    $nilai_angka  = $konversi[$nilai_huruf];

    $stmt = $conn->prepare("UPDATE nilai SET mata_kuliah=?, sks=?, nilai_huruf=?, nilai_angka=? WHERE id=?");
    $stmt->bind_param("sdsdi", $mata_kuliah, $sks, $nilai_huruf, $nilai_angka, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Nilai berhasil diperbarui!'); window.location='lihat-nilai.php?id=$mahasiswa_id';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui data!');</script>";
    }
}
?>
</body>
</html>
