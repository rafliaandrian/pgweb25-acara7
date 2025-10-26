<?php
header("Content-Type: application/json");

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "peta_rafli");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data titik
$sql = "SELECT * FROM titik";
$result = $koneksi->query($sql);

// Buat array hasil
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Kembalikan data dalam format JSON
echo json_encode($data);

$koneksi->close();
?>
