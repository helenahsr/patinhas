<?php
    session_start();
    if(!isset($_SESSION['uname'])){
        header('location:../login/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    Bem vindo(a), <?php echo $_SESSION['uname']; ?>! <br>
    <a href="../../controller/DeslogarUsuario.php">Sair</a>
</body>
</html>