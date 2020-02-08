<?php
    
    class UserModel {

        private $db,$conn;
        
        function __construct(){
            require_once('../connection/connection.php');
            $this->db = new ConexaoDB();
            $this->conn = $this->db->mysqli;
        }

        function signUp($cpf, $nome, $senha, $confirmacaoSenha, $salario, $numero_conta, $cargo){

            try{

                if($senha == $confirmacaoSenha){
                    $pass = md5($senha);
                    $hoje = date('y.m.d');

                    $query = $this->conn->query("INSERT into funcionarios (cpf,nome,senha,salario,numero_conta,cargo,contratado_em) values ('$cpf','$nome','$pass','$salario','$numero_conta','$cargo','$hoje');");

                    return true;
                }

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");
                return false;

            }

            return false;

        }

        function signIn($cpf, $senha){
            
            try{

                $pass = md5($senha);
                $query = $this->conn->query("SELECT * from funcionarios where cpf = '$cpf' and senha = '$pass';");
                $array = array(
                    "cpf"=>(string)$query->fetch_array()["cpf"],
                    "nome"=>(string)$query->fetch_array()["nome"],
                    "senha"=>(string)$query->fetch_array()["senha"],
                    "salario"=>(string)$query->fetch_array()["salario"],
                    "numero_conta"=>(string)$query->fetch_array()["numero_conta"],
                    "cargo"=>(string)$query->fetch_array()["cargo"],
                    "contratado_em"=>(string)$query->fetch_array()["contratado_em"],
                );
                
                return $array;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return null;

        }


    }

?>