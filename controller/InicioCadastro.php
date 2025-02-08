<?php
function processarFormulario()
{
    // Requires
    require_once './CadastroUsuarioController.php';
    require_once '../models/CadastroUsuario.php';

    $nome = $_POST['nomeUsuarioCadastro'];
    $sobrenome = $_POST['sobrenomeUsuarioCadastro'];
    $email = $_POST['emailUsuarioCadastro'];
    $cpf = $_POST['cpfUsuarioCadastro'];
    $senha = password_hash($_POST['senhaUsuarioCadastro'], PASSWORD_BCRYPT);

    $cadastroUsuario = new CadastroUsuario();

    $cadastroUsuario->ConstroiUser($nome, $sobrenome, $email, $cpf, $senha);
    
    $cadastroUsuarioController = new CadastroUsuarioController();
    $cadastroUsuarioController->InserirUsuario($cadastroUsuario);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    processarFormulario();
}
?>