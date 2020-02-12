<?php
    
    class ProductModel {

        private $db,$conn;
        
        function __construct(){
            require_once('../connection/connection.php');
            $this->db = new ConexaoDB();
            $this->conn = $this->db->mysqli;
        }

        function cadastrarProduto($nome,$valor,$quantidade,$descricao){

            try{

                $this->conn->query("INSERT into produtos (nome,valor,quantidade,descricao) values ('$nome','$valor',$quantidade,'$descricao');");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!')</script>");

            }

            return true;

        }

        function dadosProduto($cod){
            
            try{

                $query = $this->conn->query("SELECT * from produtos where cod=$cod;");
                $dados = $query->fetch_array();
                $array = array(
                    "cod"=>$dados["cod"],
                    "nome"=>(string)$dados["nome"],
                    "valor"=>(string)$dados["valor"],
                    "quantidade"=>$dados["quantidade"],
                    "descricao"=>(string)$dados["descricao"],
                );
                
                return $array;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!')</script>");

            }

            return null;

        }

        function todosDados(){

            try{

                $query = $this->conn->query("SELECT * from produtos;");
                $dados = $query->fetch_all();
                
                return $dados;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!')</script>");

            }

        }

        function verificarProduto($cod){

            try{

                $query = $this->conn->query("SELECT * from produtos where cod=$cod;");
                if ($query->num_rows > 0){
                    return true;
                }
                return false;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!')</script>");

            }

            return null;

        }

        function editarProduto($cod,$nome,$valor,$quantidade,$descricao){

            try{

                $this->conn->query("UPDATE produtos SET nome='$nome',valor='$valor',quantidade=$quantidade,descricao='$descricao' WHERE cod = $cod;");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!')</script>");

            }

            return false;

        }

        function deletarProduto($cod){

            try{

                $this->conn->query("DELETE from venda WHERE cod_produtoFK='$cod';");
                $this->conn->query("DELETE from produtos WHERE cod=$cod;");

                return true;

            }catch(Exception $e){

                echo("<script>alert('Erro ao inserir dados no banco!')</script>");

            }

            return false;

        }


    }

?>