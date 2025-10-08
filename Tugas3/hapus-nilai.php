<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil mahasiswa_id dulu sebelum dihapus
    $stmt = $conn->prepare("SELECT mahasiswa_id FROM nilai WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        $mahasiswa_id = $result['mahasiswa_id'];

        $delete = $conn->prepare("DELETE FROM nilai WHERE id = ?");
        $delete->bind_param("i", $id);

        if ($delete->execute()) {
            echo "<script>alert('Data nilai berhasil dihapus!'); window.location='lihat-nilai.php?id=$mahasiswa_id';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data!'); window.location='lihat-nilai.php?id=$mahasiswa_id';</script>";
        }
    } else {
        echo "<script>alert('Nilai tidak ditemukan!'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid!'); window.location='index.php';</script>";
}
?>
