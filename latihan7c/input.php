<?php
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = ""; // sesuaikan
$dbname = "latihan7b";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query insert
$sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk)
VALUES ('$kecamatan', $longitude, $latitude, $luas, $jumlah_penduduk)";

if ($conn->query($sql) === TRUE) {
    echo "Data baru berhasil disimpan.<br><a href='index.html'>Kembali ke form</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>