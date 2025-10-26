<!DOCTYPE html>
<html>
<head>
    <title>Latihan 7A - Dasar PHP</title>
</head>
<body>

<h2>1. Perintah Dasar</h2>
<?php
echo "Hallo semuanya!";
?>

<h2>2. Komentar</h2>
<?php
// Ini adalah komentar satu baris
/*
   Ini adalah komentar
   multi-baris
*/
# hai #
echo "Komentar tidak akan tampil di output.";
?>

<h2>3. Variabel</h2>
<?php
$kata = "Ini Tes";
$angka = 88;
echo "$kata dan nilainya $angka";
?>

<h2>4. String</h2>
<?php
$teks = "Hallo semuanya!";
echo $teks;
?>

<h2>5. Operator Penggabungan String</h2>
<?php
$teks1 = "Hallo semuanya!";
$teks2 = "12345";
echo $teks1 . " " . $teks2;
?>

<h2>6. Panjang String</h2>
<?php
echo strlen("Hallo semuanya!");
?>

<h2>7. Mencari Karakter di dalam String</h2>
<?php
echo strpos("Hallo semuanya!","semua");
?>

<h2>8. Array Numerik 1</h2>
<?php
$nama = array("Joko","Parto","Jono");
echo $nama[1]." dan ".$nama[2]." adalah tetangga Pak ".$nama[0];
?>

<h2>9. Array Numerik 2</h2>
<?php
$nama[0] = "Joko"; 
$nama[1] = "Parto"; 
$nama[2] = "Jono"; 
echo $nama[1]." dan ".$nama[2]." adalah tetangga Pak ".$nama[0];
?>

<h2>9. Array Asosiatif 1</h2>
<?php
$umur = array("Joko"=>33, "Parto"=>35, "Jono"=>29);
echo "Umur Joko adalah ".$umur['Joko'];
?>

<h2>9. Array Asosiatif 2</h2>
<?php
$umur['Joko'] = "33"; 
$umur['Parto'] = "35"; 
$umur['Jono'] = "29"; 
echo "Umur Joko adalah ".$umur['Joko'];
?>

<h2>10. Array Multidimensi</h2>
<?php
$keluarga = array(
    "Joko"=>array("Jojon","Joni","Joana"),
    "Parto"=>array("Parmi"),
    "Warto"=>array("Warman","Warno","Warmin")
);
echo $keluarga["Joko"][2] ." adalah anggota keluarga Joko";
?>

<h2>11. IF ELSE 1</h2>
<?php
$d = date("D");
if ($d=="Sat")
    echo "Selamat berakhir pekan!";
else
    echo "Semoga hari anda menyenangkan!";
?>

<h2>11. IF ELSE 2</h2>
<?php
$d = "Sat"; // simulasi hari Sabtu
if ($d=="Sat") 
{ 
    echo "Hallo!<br />"; 
    echo "Selamat berakhir pekan! "; 
    echo "Sampai jumpa di hari Senin!"; 
} 
?>

<h2>12. ELSEIF</h2>
<?php
$d = date("D");
if ($d=="Sat")
    echo "Selamat berakhir pekan!";
elseif ($d=="Sun")
    echo "Semoga hari Minggu anda menyenangkan!";
else
    echo "Semoga hari anda menyenangkan!";
?>

<h2>13. SWITCH</h2>
<?php
$x = 2;
switch ($x) {
    case 1: echo "Angka 1"; break;
    case 2: echo "Angka 2"; break;
    case 3: echo "Angka 3"; break;
    default: echo "Bukan angka antara 1 sampai 3";
}
?>

<h2>14. WHILE</h2>
<?php
$i = 1;
while($i <= 5){
    echo "Angka $i <br/>";
    $i++;
}
?>

<h2>15. DO WHILE</h2>
<?php
$i = 0;
do {
    $i++;
    echo "Angka $i <br/>";
} while ($i < 5);
?>

<h2>16. FOR</h2>
<?php
for ($i=1; $i<=5; $i++){
    echo "Hello World!<br/>";
}
?>

<h2>17. FOREACH</h2>
<?php
$arr = array("satu", "dua", "tiga");
foreach ($arr as $nilai){
    echo "Nilai: $nilai<br/>";
}
?>

<h2>18. FUNCTION 1</h2>
<?php 
    include 'vars_test.php'; 
    echo "Sebuah $buah $warna"; //Sebuah apel hijau 
?> 

<h2>18. FUNCTION 2</h2>
<?php
function tulisNama(){
    echo "Merapi";
}
tulisNama();
?>

<h2>19. URL</h2>
<?php
    echo "<a href=vars.php?nama=Merapi&alamat=Sleman>Gunung</a>";
?>

<h2>20. FORM INPUT</h2>
<html> 
<body> 
<form action="welcome.php" method="post"> 
Nama: <input type="text" name="nama" /> 
Umur: <input type="text" name="umur" /> 
<input type="submit" value="Kirim"/> 
</form> 
</body> 
</html> 

</body>
</html>