<?php

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

    public function searchClasses($classe){

        $query = "SELECT nrprocesso,parte_autora,parte_re,classe_processual FROM processos WHERE classe_processual LIKE '%{$classe}%' ORDER BY nrprocesso";

        return $this->banco->query($query);
  
    }

    public function searchAdvogado($advogado){

        $query = "SELECT * FROM processos WHERE advogado LIKE '%{$advogado}%'";

        return $this->banco->query($query);
  
    }

    public function searchMagistrado($magistrado,$parte_re,$pro_improcedente){

        echo "<script>console.log( 'MAGISTRADO: " . $magistrado . "' );</script>";
        echo "<script>console.log( 'PARTE RE: " . $parte_re . "' );</script>";
        echo "<script>console.log( 'SENTENCA: " . $pro_improcedente . "' );</script>";

        if ($parte_re === '' and $pro_improcedente === ''){
        
            $query = "SELECT * FROM processos WHERE magistrado LIKE '%{$magistrado}%'";

            echo "<script>console.log( 'ENTROU NO IF' );</script>";

            return $this->banco->query($query);
        
        } elseif ($parte_re === '') {

            $query = "SELECT * FROM processos WHERE magistrado LIKE '%{$magistrado}%' AND pro_improcedente LIKE '%{$pro_improcedente}%'";

            echo "<script>console.log( 'ENTROU NO ELSEIF' );</script>";

            //echo "<script>console.log( 'QUERY: " . $query . "' );</script>";

            return $this->banco->query($query);

        } else {

            $query = "SELECT * FROM processos WHERE magistrado LIKE '%{$magistrado}%' AND parte_re LIKE '%{$parte_re}%' AND pro_improcedente LIKE '%{$pro_improcedente}%'";

            echo "<script>console.log( 'ENTROU NO ELSE' );</script>";

            //echo "<script>console.log( 'QUERY: " . $query . "' );</script>";

            return $this->banco->query($query);

        }

    }

}

?>