<?php

    class ConexaoDB {

        public $mysqli;
        
        public function __construct() {
            try{
                date_default_timezone_set('UTC');

                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "control_store";
        
                $this->mysqli = new mysqli($host,$user,$pass,$db);
            }catch(Exception $e){
                echo("<script>alert('Erro ao conectar com o banco de dados!\nErro: $e')</script>");
            }
        }

    }

?>