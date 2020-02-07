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
                $hoje = date('y.m.d');

                $query = $this->conn->query("INSERT into funcionarios (cpf,nome,senha,salario,numero_conta,cargo,contratado_em) values ('$cpf','$nome','$pass','$salario','$numero_conta','$cargo','$hoje');");

                echo "<script>alert('Cadastrado com sucesso!');</script>";

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

        }


    }

?>