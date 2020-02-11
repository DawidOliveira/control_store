<?php
    
    class SaleModel {

        private $db,$conn;
        
        function __construct(){
            require_once('../connection/connection.php');
            $this->db = new ConexaoDB();
            $this->conn = $this->db->mysqli;
        }

        function cadastrarVenda($cod_produtoFK,$cpf_funcionarioFK,$quantidade){

            try{

                $prod = $this->conn->query("SELECT valor,quantidade from produtos where cod = $cod_produtoFK;");
                $aux = $prod->fetch_array();
                $valor_total = $quantidade * $aux["valor"];
                
                $this->conn->query("INSERT into venda (cod_produtoFK,cpf_funcionarioFK,quantidade,valor_total) values ($cod_produtoFK,'$cpf_funcionarioFK',$quantidade,'$valor_total');");
                
                $nova_quantidade = $aux["quantidade"] - $quantidade;

                $this->conn->query("UPDATE produtos SET quantidade = $nova_quantidade WHERE cod = $cod_produtoFK;");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao consultar banco!')</script>");

            }

            return false;

        }

        function dadosVenda($cod){
            
            try{

                $query = $this->conn->query("SELECT * from venda where cod=$cod;");
                $dados = $query->fetch_array();
                $array = array(
                    "cod"=>$dados["cod"],
                    "cod_produtoFK"=>(string)$dados["cod_produtoFK"],
                    "cpf_funcionarioFK"=>(string)$dados["cpf_funcionarioFK"],
                    "quantidade"=>$dados["quantidade"],
                    "valor_total"=>(string)$dados["valor_total"],
                );
                
                return $array;

            }catch(Exception $e){

                echo("<script>alert('Erro ao consultar banco!')</script>");

            }

            return null;

        }

        function verificarVenda($cod){
            try{

                $query = $this->conn->query("SELECT * from venda where cod=$cod");
                if($query->num_rows>0){
                    return true;
                }
                return false;

            }catch(Exception $e){
                echo("<script>alert('Erro ao consultar banco!')</script>");
            }
        }

        function deletarVenda($cod){

            try{

                $this->conn->query("DELETE from venda WHERE cod='$cod';");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao consultar banco!')</script>");

            }

            return false;

        }


    }

?>