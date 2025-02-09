<?php
function processarFormularioComplemento()
{
    // Requires
    require_once './CadastroUsuarioController.php';
    require_once '../models/CadastroUsuario.php';

    $telefone = $_POST['telefone'];

    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    $cadastroUsuario = new CadastroUsuario();

    $cadastroUsuario->constroiEndereco($cep, $rua, $numero, $complemento, $bairro, $cidade, $estado, $pais);
    $cadastroUsuario->setTelefone($telefone);

    $cadastroUsuarioController = new CadastroUsuarioController();
    $cadastroUsuarioController->InserirDadosComplementares($cadastroUsuario);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    processarFormularioComplemento();
}
?>