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
                    echo("<script>alert('Usuário cadastrado!')</script>")                ;
                    return true;                
                } else{ 
                    echo("<script>alert('Erro ao inserir no banco de dados!')</script>")                ;
                    return false;
                }
            } else {
                echo("<script>alert('Senhas diferentes!')</script>");
                return false;
            }           
        }
        
        function signIn($cpf, $senha){
            // if ( session_status() !== PHP_SESSION_ACTIVE ){
            //    session_start();
            // }

            session_start();

            if(!($this->user->signIn($cpf, $senha))){
                unset ($_SESSION['cpf']);
                unset ($_SESSION['senha']);
                echo("<script>alert('CPF ou senha incorretos!')</script>"); 
                
                return false;
            }
            else{
                $dados = $this->user->buscarFuncionario($cpf);
                $_SESSION['logado'] = true;
                $_SESSION['cpf'] = $cpf;
                $_SESSION['senha'] = $senha;
                $_SESSION['dados'] = $dados;
                echo("<script>alert('Usuário logado!')</script>");                              
            }
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

        function todosFuncionarios(){
            try{
                $dados = $this->user->todosFuncionarios();
                
                return $dados;
            }catch(Exception $e){
                echo("<script>alert('Erro ao inserir dados no banco!')</script>");
            }
        }

        function logout(){
            session_destroy();
            header("Location: index");
        }
    }   
?>

