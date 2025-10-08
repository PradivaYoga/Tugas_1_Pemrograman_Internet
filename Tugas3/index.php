<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        #keyword {
            width: 320px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }
        #keyword:focus {
            border-color: #007BFF;
            box-shadow: 0 0 6px rgba(0,123,255,0.4);
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            opacity: 0;
            transform: translateY(15px);
            transition: all 0.3s ease;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 14px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        #hasil-pencarian table.show {
            opacity: 1;
            transform: translateY(0);
        }
        p.no-data {
            color: #777;
            text-align: center;
            font-style: italic;
        }
        .aksi a {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <center>
        <h2>Daftar Mahasiswa</h2>
        <a href="tambah.php">+ Tambah Mahasiswa</a>
        <br><br>

        <input type="text" id="keyword" placeholder="Cari nama / NIM / prodi..." autocomplete="off">
        <br><br>
    </center>

    <div id="hasil-pencarian">
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa ORDER BY id ASC");
        if ($result->num_rows > 0) {
            echo "<table class='show'>
                    <tr>
                        <th>ID</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['prodi']}</td>
                        <td class='aksi'>
                            <a href='edit.php?id={$row['id']}'>Edit</a> | 
                            <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a> | 
                            <a href='lihat-nilai.php?id={$row['id']}'>Lihat Nilai</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='no-data'>Belum ada data mahasiswa.</p>";
        }
        ?>
    </div>

    <script>
    const keywordInput = document.getElementById("keyword");
    const hasilDiv = document.getElementById("hasil-pencarian");

    keywordInput.addEventListener("keyup", function() {
        const keyword = this.value.trim();
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                hasilDiv.innerHTML = xhr.responseText;

                const table = hasilDiv.querySelector("table");
                if (table) {
                    setTimeout(() => {
                        table.classList.add("show");
                    }, 30);
                }
            }
        };

        xhr.open("GET", "cari-mahasiswa.php?keyword=" + encodeURIComponent(keyword), true);
        xhr.send();
    });
    </script>
</body>
</html>
