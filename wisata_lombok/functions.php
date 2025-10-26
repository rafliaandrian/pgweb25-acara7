<?php
$conn = mysqli_connect("localhost", "root", "", "wisata_lombok");

// Fungsi untuk menjalankan query dan mengembalikan hasilnya
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambah data ke database
function tambah($data) {
    global $conn;
    $nama_unsur = htmlspecialchars($data["nama_unsur"]);
    $orde1 = htmlspecialchars($data["orde1"]);
    $orde2 = htmlspecialchars($data["orde2"]);
    $orde3 = htmlspecialchars($data["orde3"]);
    $orde4 = htmlspecialchars($data["orde4"]);
    $orde5 = htmlspecialchars($data["orde5"]);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    // Perbaikan: Menghapus nilai kosong untuk 'id' dan membiarkan database mengatur nilai AUTO_INCREMENT
    $query = "INSERT INTO wisata_lombok (nama_unsur, orde1, orde2, orde3, orde4, orde5, foto) VALUES ('$nama_unsur', '$orde1', '$orde2', '$orde3', '$orde4', '$orde5', '$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengunggah foto
function upload() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Foto harus diupload..');</script>";
        return false;
    }

    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = strtolower(end(explode('.', $namaFile)));

    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>alert('Cek kembali ekstensi file Anda!');</script>";
        return false;
    }

    if ($ukuranFile > 2000000000) {
        echo "<script>alert('Ukuran foto terlalu besar!');</script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiFoto;

    // Perbaikan: Memeriksa apakah direktori img/ ada, jika tidak dibuat
    if (!is_dir('img')) {
        mkdir('img', 0777, true);
    }

    if (move_uploaded_file($tmpName, 'img/' . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        echo "<script>alert('Gagal mengunggah foto!');</script>";
        return false;
    }
}

// Fungsi untuk menghapus data berdasarkan ID
function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM wisata_lombok WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengedit data
function edit($data) {
    global $conn;
    $id = $data["id"];
    $nama_unsur = htmlspecialchars($data["nama_unsur"]);
    $orde1 = htmlspecialchars($data["orde1"]);
    $orde2 = htmlspecialchars($data["orde2"]);
    $orde3 = htmlspecialchars($data["orde3"]);
    $orde4 = htmlspecialchars($data["orde4"]);
    $orde5 = htmlspecialchars($data["orde5"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    $foto = ($_FILES['foto']['error'] === 4) ? $fotoLama : upload();
    $query = "UPDATE wisata_lombok SET nama_unsur='$nama_unsur', orde1='$orde1', orde2='$orde2', orde3='$orde3', orde4='$orde4', orde5='$orde5', foto='$foto' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk mencari data berdasarkan keyword
function cari($keyword) {
    $query = "SELECT * FROM wisata_lombok WHERE nama_unsur LIKE '%$keyword%'";
    return query($query);
}
?>
