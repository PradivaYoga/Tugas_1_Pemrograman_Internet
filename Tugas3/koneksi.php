<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kampus";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (basename($_SERVER['PHP_SELF']) == "koneksi.php") {
    echo "Koneksi ke database berhasil!";
}
?>
