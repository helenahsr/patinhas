<?php

class CadastroUsuario {
    private $nome;
    private $sobrenome;
    private $email;
    private $cpf;
    private $senha;
    private $telefone;
    private $cep;
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $pais;

    public function ConstroiUser($nome, $sobrenome, $email, $cpf, $senha) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    public function constroiEndereco($cep, $rua, $numero, $complemento, $bairro, $cidade, $estado, $pais) {
        $this->cep = $cep;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->pais = $pais;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getFullName() {
        return $this->nome . ' ' . $this->sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

}