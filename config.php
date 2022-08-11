<?php 
$url="http://localhost/loginadinda/index.php";

// Config database
$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'data',
]; 
// Global Variabel db untuk query 
$db = mysqli_connect($config['host'], $config['username'], $config['password'], $config['name']);

function registrasi ($data) {
    global $db;

    $username=strtolower(stripslashes($data["username"],));
    $password=mysqli_real_escape_string($db, $data["password"],);

//cek username sudah ada atau belum
$result = mysqli_query($db, "SELECT username FROM `pengguna` WHERE username = '$username'");

if (mysqli_fetch_assoc($result)) {
    echo "<script> alert('username sudah terdaftar!');</script>";
    return false;
}
// password hash
$password = password_hash($password, PASSWORD_DEFAULT);
 // insert database
 mysqli_query ($db, "INSERT INTO `pengguna` VALUES('','$username','$password')");
 return mysqli_affected_rows($db);
}
?>