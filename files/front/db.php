<?php

//$teste=$argv[1];

class justicafacilDatabase {
    private $dbhost = "172.29.0.2";
    private $dbuser = "jf";
    private $dbpass = "Q8ScP6Pjq3NjatXz";
    private $dbname = "justicafacil";
    public $banco;

    public function __construct()
    {
        $this->banco = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    }

    public function __destruct()
    {
        $this->banco->close();
    }

    public function listClasses(){

        $query = "SELECT DISTINCT classe_processual FROM processos ORDER BY classe_processual";

        return $this->banco->query($query);
  
    }

    public function searchAdvogado($advogado){

        $query = "SELECT * FROM processos WHERE advogado LIKE '%{$advogado}%'";

        return $this->banco->query($query);
  
    }

    public function searchMagistrado($magistrado){

        $query = "SELECT * FROM processos WHERE magistrado LIKE '%{$magistrado}%'";

        return $this->banco->query($query);

    }

}

?>