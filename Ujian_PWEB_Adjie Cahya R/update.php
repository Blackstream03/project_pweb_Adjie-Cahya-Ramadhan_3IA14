<?php
$mysqli = new mysqli('localhost', 'root', '', 'siswa');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli('localhost', 'root', '', 'siswa');

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    $update = "UPDATE data_siswa SET nama='$nama', kelas='$kelas', alamat='$alamat' WHERE nis='$nis'";

    if ($mysqli->query($update)) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error: " . $update . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Mahasiswa</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nis">NIS:</label><br>
    <input type="text" id="nis" name="nis"><br>
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama"><br>
    <label for="kelas">Kelas:</label><br>
    <input type="text" id="kelas" name="kelas"><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat"><br>
    <input type="submit" value="Update">
</form>
