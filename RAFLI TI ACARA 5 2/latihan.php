<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=daftar_mahasiswa', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $pdo->query("SELECT * FROM daftar_mahasiswa");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    
    echo "<pre>$json_data</pre>";

} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
