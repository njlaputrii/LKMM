<?php 
include 'koneksi.php';

ob_start();
session_start();

$_SESSION["Siswa"] = null;
$_SESSION["TU"] = null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <center><h1>LOGIN</h1>
        <label for="">Username</label>
        <input type="text" name="username">
        <br>
        <br>
        <label for="">Password</label>
        <input type="text" name="password">   
        <br><br>
        <input type="submit" name="simpan" value="Login">
        </center>
    </form>
</body>
</html>

<?php

if (isset($_POST['simpan'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql=mysqli_query($koneksi,"SELECT * FROM siswa WHERE username ='$username' AND password ='$password' ");

    $ketemu = mysqli_num_rows($sql);

    $data = $sql->fetch_array();

    if ($ketemu >= 1) {
        session_start();
        
        if ($data['level'] == "Siswa") {
            $_SESSION['Siswa'] = $data['nis'];
            header("location:index_siswa.php");
        }elseif ($data['level'] == "TU") {
            $_SESSION['TU'] = $data['nis'];
            header("location:index.php");
        }
      }else{
         ?>
        <script>
            alert('Username atau Password anda Salah')
            window.location.href= 'login.php';
        </script>
        <?php
    }
    
}
?>