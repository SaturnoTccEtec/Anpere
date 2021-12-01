<?php 

class SolicitacaoParceria{
    private $idsolicitacaoparceria;
    private $descricao;
    private $idremetente;
    private $iddestinatario;

    /* ------------ MÉTODOS ------------ */
    public function inserirSolicitacao(){

    }

    public function selectSolicitacao($id){
        $conn = Connection::GET_PDO();

        $querySelect = ("SELECT * FROM tbSolicitacaoParceria WHERE idDestinatario = '$id'");
        $return = $conn->query($querySelect);

        $return_one = $return->fetchAll();
        return $return_one;
    }

    /**
     * Get the value of iddestinatario
     */ 
    public function getIddestinatario()
    {
        return $this->iddestinatario;
    }

    /**
     * Set the value of iddestinatario
     *
     * @return  self
     */ 
    public function setIddestinatario($iddestinatario)
    {
        $this->iddestinatario = $iddestinatario;

        return $this;
    }
}


?>