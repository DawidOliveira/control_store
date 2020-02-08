<?php
    include_once('../models/userModel.php');

    class UserController{

        //function signUp($cpf, $nome, $senha, $salario, $num_conta, $cargo){
        function signUp(){
            $user = new UserModel();

            $cpf = $_POST("cpfCampo");
            $nome = $_POST("nomeCampo");
            $senha = $_POST("senhaCampo");
            $conf_senha = $_POST("confsenhaCampo");
            $num_conta = $_POST("contaCampo");
            $cargo = $_POST("cargoCampo");
                        
            if($user->signUp($cpf, $nome, $senha, $salario, $num_conta, $cargo)){                
                return true;                
            } else{                
                return false;
            }
        }


    }


?>