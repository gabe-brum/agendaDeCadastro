<?php
class Contato
{
    // Atributos da classe
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $telefone;
    private $cep;
    private $logradouro;
    private $numero;
    private $cidade;
    private $bairro;
    private $uf;

    // Métodos Mágicos (get e set)
    public function __get($valor)
    {
        return $this->$valor;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
}
