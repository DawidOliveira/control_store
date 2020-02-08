<?php
    include_once('../models/userModel.php');

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
        

        function signUp($cpf, $nome, $senha, $salario, $num_conta, $cargo){                                            
            if($this->user->signUp($cpf, $nome, $senha, $salario, $num_conta, $cargo)){                
                return true;                
            } else{                
                return false;
            }
        }
    }
?>