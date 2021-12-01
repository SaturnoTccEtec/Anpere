<?php

class Publicacao{
    private $idpublicacao;
    private $foto;
    private $precoProduto;
    private $descricao;
    private $idAvaliacao; 
    private $idperfilempresa;
    private $linkavaliacao;

/* --------- MÉTODOS -------- */

public function addPublicacao($publicacao){
    $conn = Connection::GET_PDO();

    $queryInsert = "INSERT INTO tbpublicacao (fotoprodutopublicacao, precoprodutopublicacao, descricopublicacao, idavaliacao, idperfilempresa, linkAvaliacao);
                    VALUES ('".$publicacao->getFoto()."',
                    '".$publicacao->getPrecoproduto()."',
                    '".$publicacao->getDescricao()."',
                    '".$publicacao->getIdAvaliacao()."',
                    '".$publicacao->getIdperfilempresa()."',
                    '".$publicacao->getLinkavaliacao()."')";

    $conn->exec($queryInsert);
}

public function readPublicacao($idEmpresa){
    $conn = Connection::GET_PDO();

    $querySelect = "SELECT * FROM tbpublicacao WHERE idEmpresa = '$idEmpresa'";
    $resultado = $conn->query($querySelect);
    $retorno = $resultado->fetchAll();

    return $retorno;
}

public function readPublicacao2($idEmpresa){
    $conn = Connection::GET_PDO();

    $querySelect = "SELECT * FROM tbpublicacao WHERE idEmpresa = '$idEmpresa' LIMIT 2";
    $resultado = $conn->query($querySelect);
    $retorno = $resultado->fetchAll();

    return $retorno;
}

/* --------- GETTERS & SETTERS -------- */
    public function getIdpublicacao()
    {
        return $this->idpublicacao;
    }

    public function setIdpublicacao($idpublicacao)
    {
        $this->idpublicacao = $idpublicacao;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    public function getPrecoProduto()
    {
        return $this->precoProduto;
    }

    public function setPrecoProduto($precoProduto)
    {
        $this->precoProduto = $precoProduto;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getIdAvaliacao()
    {
        return $this->idAvaliacao;
    }

    public function setIdAvaliacao($idAvaliacao)
    {
        $this->idAvaliacao = $idAvaliacao;

        return $this;
    }

    public function getIdperfilempresa()
    {
        return $this->idperfilempresa;
    }

    public function setIdperfilempresa($idperfilempresa)
    {
        $this->idperfilempresa = $idperfilempresa;

        return $this;
    }

    /**
     * Get the value of linkavaliacao
     */ 
    public function getLinkavaliacao()
    {
        return $this->linkavaliacao;
    }

    /**
     * Set the value of linkavaliacao
     *
     * @return  self
     */ 
    public function setLinkavaliacao($linkavaliacao)
    {
        $this->linkavaliacao = $linkavaliacao;

        return $this;
    }
}
