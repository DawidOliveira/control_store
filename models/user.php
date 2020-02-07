<?php
    
    class UserModel {

        private $db,$conn;
        
        function __construct(){
            require_once('../connection/connection.php');
            $this->db = new ConexaoDB();
            $this->conn = $this->db->mysqli;
        }

        function signUp($cpf, $nome, $senha, $salario, $numero_conta, $cargo){

            try{

                $pass = md5($senha);

                $query = $conn->query("INSERT into funcionarios (cpf,nome,senha,salario,numero_conta,cargo,contratado_em) values ('$cpf','$nome','$pass',$)");

            }catch(Exception $e){

            }

        }


    }

?>