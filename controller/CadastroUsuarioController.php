<?php
session_start();
require_once '../bd/conexao.php';
require_once '../models/CadastroUsuario.php';

class CadastroUsuarioController {
    public function InserirUsuario(CadastroUsuario $u) {
        $sql = "INSERT INTO users(nome, email, senha, cpf) VALUES (?,?,?,?)";

        $stmt = ClasseConexao::Conexao()->prepare($sql);

        $fullName = $u->getFullName();
        $email = $u->getEmail();
        $senha = $u->getSenha();
        $cpf = $u->getCpf();

        $stmt->bindParam(1, $fullName);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $senha);
        $stmt->bindParam(4, $cpf);

        $stmt->execute();

        $_SESSION['uid'] = ClasseConexao::Conexao()->lastInsertId();
        $_SESSION['uname'] = $u->getFullName();

        header('Location: ../view/cadastroUsuario/dados-complementares.php');
    }

    public function InserirDadosComplementares(CadastroUsuario $u) {
        $sql = "UPDATE users SET telefone = ? WHERE id = ?";

        $stmt = ClasseConexao::Conexao()->prepare($sql);

        $telefone = $u->getTelefone();
        $id = $_SESSION['uid'];

        $stmt->bindParam(1, $telefone);
        $stmt->bindParam(2, $cep);
        $stmt->bindParam(3, $rua);
        $stmt->bindParam(4, $bairro);
        $stmt->bindParam(5, $cidade);
        $stmt->bindParam(6, $estado);
        $stmt->bindParam(7, $pais);
        $stmt->bindParam(8, $numero);
        $stmt->bindParam(9, $complemento);
        $stmt->bindParam(10, $id);

        $stmt->execute();

        $sql = "INSERT INTO `address`(cep, rua, bairro, cidade, estado, pais, numero, complemento, user_id) VALUES (?,?,?,?,?,?,?,?,?,?)";

        unset($_SESSION['dados_preenchidos']);

        header('Location: ../view/login/login.php');
    }
}