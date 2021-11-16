<?php 

class Avaliacao{

    private $idAvaliacao;
    private $idCliente;
    private $comentarioAvaliacao;
    private $notaAvaliacao;
	private $idPublicacao;


     /* ------- CONSTRUTOR --------- */
    function __construct()
    {
        
    }
    /* -------- MÉTODOS ---------- */



    /* ------- GETTERS & SETTERS --------- */


    public function getIdAvaliacao(){
		return $this->idAvaliacao;
	}

	public function setIdAvaliacao($idAvaliacao){
		$this->idAvaliacao = $idAvaliacao;
	}

	public function getIdCliente(){
		return $this->idCliente;
	}

	public function setIdCliente($idCliente){
		$this->idCliente = $idCliente;
	}

	public function getComentarioAvaliacao(){
		return $this->comentarioAvaliacao;
	}

	public function setComentarioAvaliacao($comentarioAvaliacao){
		$this->comentarioAvaliacao = $comentarioAvaliacao;
	}

	public function getNotaAvaliacao(){
		return $this->notaAvaliacao;
	}

	public function setNotaAvaliacao($notaAvaliacao){
		$this->notaAvaliacao = $notaAvaliacao;
	}

	public function getIdPublicacao()
	{
		return $this->idPublicacao;
	}

	public function setIdPublicacao($idPublicacao)
	{
		$this->idPublicacao = $idPublicacao;

		return $this;
	}
}

?>