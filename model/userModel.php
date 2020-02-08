<?php
    
    class UserModel {

        private $db,$conn;
        
        function __construct(){
            require_once('../connection/connection.php');
            $this->db = new ConexaoDB();
            $this->conn = $this->db->mysqli;
        }

        //feita
        function signUp($cpf, $nome, $senha, $salario, $numero_conta, $cargo){

            try{

                $pass = md5($senha);
                $hoje = date('y.m.d');

                $this->conn->query("INSERT into funcionarios (cpf,nome,senha,salario,numero_conta,cargo,contratado_em) values ('$cpf','$nome','$pass','$salario','$numero_conta','$cargo','$hoje');");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return false;

        }


        //
        function signIn($cpf, $senha){
            
            try{
                $pass = md5($senha);
                $query = $this->conn->query("SELECT * from funcionarios where cpf = '$cpf' and senha = '$pass';");
                if($query->num_rows > 0){
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
                }
                
                return false;

            }catch(Exception $e){

                echo("<script>alert('Erro ao selecionar dados no banco!\nErro: $e')</script>");

            }

            return null;

        }

        //feita
        function funcExiste($cpf){
            try{
                $query = $this->conn->query("SELECT * from funcionarios where cpf = '$cpf';");
                $qtd = $query->num_rows;                             
                
                if($qtd > 0 ){                    
                    return true;
                } else {                    
                    return false;
                }
            } catch(Exception $e){
                echo("<script>alert('Erro ao selecionar dados no banco!\nErro: $e')</script>");
            }
        }

        //feita
        function buscarFuncionario($cpf){
            
            try{

                $query = $this->conn->query("SELECT * from funcionarios where cpf = '$cpf';");
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

                echo("<script>alert('Erro ao selecionar dados no banco!\nErro: $e')</script>");

            }

            return null;

        }

        //feita
        function editarFuncionario($cpf, $nome, $salario, $numero_conta, $cargo){

            try{

                $this->conn->query("UPDATE funcionarios SET nome='$nome',salario='$salario',numero_conta='$numero_conta',cargo='$cargo' WHERE cpf = '$cpf';");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!\nErro: $e')</script>");

            }

            return false;

        }

        //feita
        function deletarFuncionario($cpf){

            try{

                $this->conn->query("DELETE from funcionarios WHERE cpf='$cpf';");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao deletar dados no banco!\nErro: $e')</script>");

            }

            return false;

        }


    }

?>