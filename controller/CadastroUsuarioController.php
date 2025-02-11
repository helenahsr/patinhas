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

        $nomeCompleto = $u->getFullName();
        $_SESSION['uid'] = ClasseConexao::Conexao()->lastInsertId();
        for ($contador = 0; $contador < strlen($nomeCompleto); $contador++) {
            if (substr($nomeCompleto, $contador, 1) == " ") {
                $_SESSION['uname'] = substr($nomeCompleto, 0, $contador);
                break;
            }
        }

        header('Location: ../view/cadastroUsuario/dados-complementares.php');
    }

    public function InserirDadosComplementares(CadastroUsuario $u) {
        $sql = "UPDATE users SET telefone = ? WHERE id = ?";

        $stmt = ClasseConexao::Conexao()->prepare($sql);

        $telefone = $u->getTelefone();
        $id = $_SESSION['uid'];

        $stmt->bindParam(1, $telefone);
        $stmt->bindParam(2, $id);

        $stmt->execute();

        $sql = "INSERT INTO `address`(cep, rua, numero, complemento, bairro, cidade, estado, pais, fk_user_id) VALUES (?,?,?,?,?,?,?,?,?)";

        $stmt = ClasseConexao::Conexao()->prepare($sql);
        $cep = $u->getCep();
        $rua = $u->getRua();
        $numero = $u->getNumero();
        $complemento = $u->getComplemento();
        $bairro = $u->getBairro();
        $cidade = $u->getCidade();
        $estado = $u->getEstado();
        $pais = $u->getPais();
        $id = $_SESSION['uid'];

        $stmt->bindParam(1, $cep);
        $stmt->bindParam(2, $rua);
        $stmt->bindParam(3, $numero);
        $stmt->bindParam(4, $complemento);
        $stmt->bindParam(5, $bairro);
        $stmt->bindParam(6, $cidade);
        $stmt->bindParam(7, $estado);
        $stmt->bindParam(8, $pais);
        $stmt->bindParam(9, $id);

        $stmt->execute();

        header('Location: ../view/dashboard/dashboard.php');
    }
}