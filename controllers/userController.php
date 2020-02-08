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

        function editarFuncionario($cpf, $nome, $salario, $numero_conta, $cargo){
            if($this->user->funcExist($cpf)){
                echo("<script>alert('ruim jao')</script>");
            } 
        }
    }   
?>