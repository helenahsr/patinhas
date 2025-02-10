<?php

session_start();
require_once "./Auth.php";

$email = filter_input(INPUT_POST, 'emailLoginUsuario', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senhaLoginUsuario'];

$auth = new Auth();
$auth->login($email, $senha);

?>
