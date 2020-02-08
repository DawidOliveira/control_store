<?php
    include_once('../model/userModel.php');

    class UserController{

        private $user;

        function __construct(){
            $this->user = new UserModel();

            //$cpf = $_POST["cpfCampo"];
            //$nome = $_POST["nomeCampo"];
            //$senha = $_POST["senhaCampo"];
            //$conf_senha = $_POST["confsenhaCampo"];
            //$num_conta = $_POST["contaCampo"];
            //$cargo = $_POST["cargoCampo"];
        }
        
        function signUp($cpf, $nome, $senha, $conf_senha, $salario, $num_conta, $cargo){                           
            if($senha == $conf_senha){
                if($this->user->signUp($cpf, $nome, $senha, $salario, $num_conta, $cargo)){                
                    return true;                
                } else{                
                    return false;
                }
            } else {
                echo("<script>alert('Senhas diferentes!')</script>");
                return false;
            }           
        }

        function signIn(){
            
        }

        function editarFuncionario($cpf, $nome, $salario, $numero_conta, $cargo){
            if($this->user->funcExiste($cpf)){
                if($this->user->editarFuncionario($cpf, $nome, $salario, $numero_conta, $cargo)){
                    echo("<script>alert('Funcionário alterado com sucesso!')</script>");
                }
            } else {
                echo("<script>alert('CPF não existente.')</script>");
            }
        }

        function deletarFuncionario($cpf){
            if($this->user->funcExiste($cpf)){
                if($this->user->deletarFuncionario($cpf)){
                    echo("<script>alert('Funcionário deletado com sucesso!')</script>");
                } 
            } else {
                echo("<script>alert('CPF não existente!')</script>");
            }
        }
    }   
?>

