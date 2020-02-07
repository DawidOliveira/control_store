<?php

    try{

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "Control_Store";

        $mysqli = new mysqli($host,$user,$pass,$db);
    }catch(Exception $e){
        echo("<script>alert('Erro ao conectar com o banco de dados!\nErro: $e')</script>");
    }

?>