<?php 

class Parceria{

    private $idParceria;
    private $idEmpresa;
    private $idEmpresaParceria;
    private $dataParceria;

    /* ------- CONSTRUTOR --------- */
    
    function __construct()
    {
            
    }
     /* -------- MÉTODOS ---------- */

	
     

    /* ------- GETTERS & SETTERS --------- */


    public function getIdParceria(){
		return $this->idParceria;
	}

	public function setIdParceria($idParceria){
		$this->idParceria = $idParceria;
	}

	public function getIdEmpresa(){
		return $this->idEmpresa;
	}

	public function setIdEmpresa($idEmpresa){
		$this->idEmpresa = $idEmpresa;
	}

	public function getIdEmpresaParceria(){
		return $this->idEmpresaParceria;
	}

	public function setIdEmpresaParceria($idEmpresaParceria){
		$this->idEmpresaParceria = $idEmpresaParceria;
	}

	public function getDataParceria(){
		return $this->dataParceria;
	}

	public function setDataParceria($dataParceria){
		$this->dataParceria = $dataParceria;
	}
}

?>