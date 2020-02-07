<?php
    require_once('../connection/connection.php');
    
    $query = $mysqli->query("SELECT * from users;");
    $row = $query->num_rows;
    
    while($a = $query->fetch_array()){
        echo $row;
    }

?>