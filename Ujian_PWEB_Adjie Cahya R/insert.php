<?php
$mysqli = new mysqli('localhost', 'root', '', 'siswa');


if($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


$nama = $_POST['nama'];
$nis = $_POST['nis'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];


$insert = "INSERT INTO data_siswa (nama, nis, kelas, alamat) VALUES ('$nama', '$nis', '$kelas', '$alamat')";


if($mysqli->query($insert)) {
    header("Location: index.php");
    exit(); 
} else {
    echo "Error: " . $insert . "<br>" . $mysqli->error;
}


$mysqli->close();
?>
