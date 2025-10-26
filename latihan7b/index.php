<!DOCTYPE html>
<html>
<head>
    <title>Data Kecamatan Sleman</title>
</head>
<body>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Nomor</th>
        <th>Nama Kecamatan</th>
    </tr>

    <?php
    // Daftar nama kecamatan di Sleman (DIY)
    $kecamatan = array(
        "Gamping", "Godean", "Moyudan", "Minggir", "Seyegan",
        "Mlati", "Depok", "Berbah", "Prambanan", "Kalasan",
        "Ngemplak", "Ngaglik", "Sleman", "Tempel", "Turi",
        "Pakem", "Cangkringan"
    );

    // Menampilkan isi array ke tabel
    $no = 1;
    foreach ($kecamatan as $nama) {
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$nama</td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>

</body>
</html>