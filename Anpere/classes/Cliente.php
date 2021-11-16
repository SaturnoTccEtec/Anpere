<?php

class Cliente {
    private $idcliente;
    private $nomecliente;
    private $cpfcliente;
    private $emailcliente;
    private $telefonecliente;
    private $senhacliente;
    private $logradouro;
    private $estado;
    private $cidade;
    private $bairro;
    private $cep;
    private $num;
    private $nivel_acesso;

    /* -------------- MÉTODOS CRUD --------------------- */

    public function verificarEmail($cliente){
        $conn = Connection::GET_PDO();

        $email = $cliente->getEmailcliente();
        $querySelect = "SELECT nomeCliente FROM tbcliente WHERE emailCliente = '$email'";
        $retorno = $conn->query($querySelect);
        $consulta_nome = $retorno->fetch(PDO::FETCH_ASSOC);
        $nome = $consulta_nome['nomeCliente'];


        return $nome;
    }

    public function verificarCpf($cliente){
        $conn = Connection::GET_PDO();

        $cpf = $cliente->getCpfcliente();
        $querySelect = "SELECT nomeCliente FROM tbcliente WHERE cpfCliente = '$cpf'";
        $retorno = $conn->query($querySelect);
        $consulta_nome = $retorno->fetch(PDO::FETCH_ASSOC);
        $nome = $consulta_nome['nomeCliente'];

        return $nome;
    }

    public function cadastrar($cliente){
        $conn = Connection::GET_PDO();

        //Etapa 1 - Insert na tabela tbcliente
        $queryInsert = "INSERT INTO tbcliente (nomecliente, cpfcliente, emailcliente, senhacliente, logradourocliente, estadocliente, 
        cidadecliente, bairrocliente, cepcliente, numendcliente)
                        VALUES ('".$cliente->getNomecliente()."',
                        '".$cliente->getCpfcliente()."',
                        '".$cliente->getEmailcliente()."',
                        '".$cliente->getSenhacliente()."',
                        '".$cliente->getLogradouro()."',
                        '".$cliente->getEstado()."',
                        '".$cliente->getCidade()."',
                        '".$cliente->getBairro()."',
                        '".$cliente->getCep()."',
                        '".$cliente->getNum()."')";
        $conn->exec($queryInsert);

        //Etapa 2 - Insert na tabela tbtelefonecliente -> Selecionar id
        $cpf = $cliente->getCpfcliente();

        $querySelect_id = "SELECT idcliente FROM tbcliente WHERE cpfcliente = '$cpf'";
        $retorno = $conn->query($querySelect_id);
        $consulta_id = $retorno->fetch(PDO::FETCH_BOTH);
        $id = $consulta_id['idcliente'];

        //Etapa 2.2 - Insert na tabela tbtelefonecliente

        $queryInsert_2 = "INSERT INTO tbtelefonecliente (idcliente, numtelefonecliente)
                          VALUE ('$id', '".$cliente->getTelefonecliente()."')";
        $conn->exec($queryInsert_2);
    }

    /* -----------GETTERS & SETTERS--------------- */

    public function getIdcliente()
    {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente)
    {
        $this->idcliente = $idcliente;

        return $this;
    }

    public function getNomecliente()
    {
        return $this->nomecliente;
    }

    public function setNomecliente($nomecliente)
    {
        $this->nomecliente = $nomecliente;

        return $this;
    }

    public function getCpfcliente()
    {
        return $this->cpfcliente;
    }

    public function setCpfcliente($cpfcliente)
    {
        $this->cpfcliente = $cpfcliente;

        return $this;
    }

    public function getEmailcliente()
    {
        return $this->emailcliente;
    }

    public function setEmailcliente($emailcliente)
    {
        $this->emailcliente = $emailcliente;

        return $this;
    }

    public function getSenhacliente()
    {
        return $this->senhacliente;
    }

    public function setSenhacliente($senhacliente)
    {
        $this->senhacliente = $senhacliente;

        return $this;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }
 
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
 
    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }
 
    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    public function getNivel_acesso()
    {
        return $this->nivel_acesso;
    }

    public function setNivel_acesso($nivel_acesso)
    {
        $this->nivel_acesso = $nivel_acesso;

        return $this;
    }

    public function getTelefonecliente()
    {
        return $this->telefonecliente;
    }

    public function setTelefonecliente($telefonecliente)
    {
        $this->telefonecliente = $telefonecliente;

        return $this;
    }
}


?>