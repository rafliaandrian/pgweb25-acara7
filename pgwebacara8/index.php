<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kecamatan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #001a33, #0044cc, #0099ff);
      color: #e8f1ff;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 60px;
    }

    .glass-container {
      width: 90%;
      max-width: 1100px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 0 40px rgba(0, 153, 255, 0.4);
    }

    h1 {
      font-weight: 700;
      font-size: 2.5rem;
      color: #fff;
      text-shadow: 0 0 10px rgba(0, 153, 255, 0.8);
      margin-bottom: 30px;
    }

    table {
      border-radius: 15px;
      overflow: hidden;
      color: #000;
    }

    thead {
      background: linear-gradient(90deg, #007bff, #00bfff);
      color: #fff;
    }

    tbody tr {
      background-color: rgba(255, 255, 255, 0.9);
      transition: all 0.3s;
    }

    tbody tr:hover {
      background-color: #d6ebff;
      transform: scale(1.01);
    }

    .btn-custom {
      background: linear-gradient(90deg, #00bfff, #007bff);
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      border: none;
      padding: 10px 20px;
      box-shadow: 0 4px 15px rgba(0, 153, 255, 0.4);
      transition: all 0.3s ease;
    }

    .btn-custom:hover {
      background: linear-gradient(90deg, #0099ff, #0044cc);
      box-shadow: 0 6px 20px rgba(0, 153, 255, 0.6);
      transform: translateY(-2px);
    }

    footer {
      margin-top: 40px;
      font-size: 0.9rem;
      color: #b8dcff;
      text-align: center;
    }

  </style>
</head>
<body>

  <div class="glass-container text-center">
    <h1>📘 Data Kecamatan</h1>

    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihan_8";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("<div class='alert alert-danger'>Koneksi gagal: " . $conn->connect_error . "</div>");
    }

    $sql = "SELECT * FROM data_kecamatan";
    $result = $conn->query($sql);

    echo "<a href='input/index.html' class='btn btn-custom mb-4'>+ Tambah Data</a>";

    if($result->num_rows > 0){
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover align-middle'>";
        echo "<thead><tr>";
        echo "<th>ID</th>";
        echo "<th>Nama Kecamatan</th>";
        echo "<th>Luas</th>";
        echo "<th>Longitude</th>";
        echo "<th>Latitude</th>";
        echo "<th>Jumlah Penduduk</th>";
        echo "</tr></thead><tbody>";

        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["kecamatan"] . "</td>";
            echo "<td>" . $row["luas"] . "</td>";
            echo "<td>" . $row["longitude"] . "</td>";
            echo "<td>" . $row["latitude"] . "</td>";
            echo "<td>" . $row["jumlah_penduduk"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table></div>";
    } else{
        echo "<p class='mt-4 text-light'>Belum ada data yang tersimpan.</p>";
    }

    $conn->close();
    ?>

    <footer>✨ Sistem Informasi Data Kecamatan © 2025</footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
