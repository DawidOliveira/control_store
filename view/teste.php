<?php

    require_once('../connection/connection.php');
    $db = new ConexaoDB();
    $conn = $db->mysqli;
    $query = $conn->query("SELECT * from funcionarios;");
    
    if($query->num_rows > 0){
        while($d = $query->fetch_array()){
            echo $d["cpf"];
        }
    }
    



?>