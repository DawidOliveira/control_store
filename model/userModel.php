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
                }

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return false;

        }

        function signIn($cpf, $senha){
            
            try{

                $pass = md5($senha);
                $query = $this->conn->query("SELECT * from funcionarios where cpf = '$cpf' and senha = '$pass';");
                $dados = $query->fetch_array();
                $array = array(
                    "cpf"=>(string)$dados["cpf"],
                    "nome"=>(string)$dados["nome"],
                    "senha"=>(string)$dados["senha"],
                    "salario"=>(string)$dados["salario"],
                    "numero_conta"=>(string)$dados["numero_conta"],
                    "cargo"=>(string)$dados["cargo"],
                    "contratado_em"=>(string)$dados["contratado_em"],
                );
                
                return $array;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return null;

        }

        function editarFuncionario($cpf, $nome, $salario, $numero_conta, $cargo){

            try{

                $query = $this->conn->query("UPDATE funcionarios SET nome='$nome',salario='$salario',numero_conta='$numero_conta',cargo='$cargo' WHERE cpf = '$cpf';");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return false;

        }

        function deletarFuncionario($cpf){

            try{

                $query = $this->conn->query("DELETE from funcionarios WHERE cpf='$cpf';");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return false;

        }


    }

?>