<?php

class Recomendacao{

    private $idrecomendacao;
    private $idempresa;
    private $idempresarecomendada;

    /* ------ MÉTODOS -----  */

    public function allRec($id){
        $conn = Connection::GET_PDO();

        //SELECT IDEMPRESA NA tbrecomendacao
        $querySelect_one = ("SELECT * FROM tbrecomendacao WHERE idEmpresa = '$id'");
        $return1 = $conn->query($querySelect_one);
        $return_one = $return1->fetchAll();

        return $return_one;
    }

    public function recEsp($id){
        $conn = Connection::GET_PDO();

        //AGORA VAMO PROCURAR A EMPRESA RECOMENDADA
        $querySelect_two = ("SELECT * FROM tbempresa WHERE idEmpresa = '$id'");
        $return = $conn->query($querySelect_two);
        $return_two = $return->fetch(PDO::FETCH_BOTH);

        return $return_two;
    }


    public function getIdempresarecomendada()
    {
        return $this->idempresarecomendada;
    }

    public function setIdempresarecomendada($idempresarecomendada)
    {
        $this->idempresarecomendada = $idempresarecomendada;

        return $this;
    }

    public function getIdempresa()
    {
        return $this->idempresa;
    }

    public function setIdempresa($idempresa)
    {
        $this->idempresa = $idempresa;

        return $this;
    }

    public function getIdrecomendacao()
    {
        return $this->idrecomendacao;
    }

    public function setIdrecomendacao($idrecomendacao)
    {
        $this->idrecomendacao = $idrecomendacao;

        return $this;
    }
}

?>