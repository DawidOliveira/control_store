<?php

    use PHPUnit\Framework\TestCase;
    use PHPUnit\DbUnit\TestCaseTrait;
    require("../controllers/productController.php");

    class ProductControllerTest extends TestCase{

        protected function setUp():void{
            $pc = new ProductController();
            // if (!extension_loaded('mysqli')) {
            //     $this->markTestSkipped(
            //     'The MySQLi extension is not available.'
            //     );
            // }
        }

        public function testCadastrarProduto():void{

            $this->assertTrue(true,$pc->cadastrarProduto("Celular","1000",10,"Xiaomi"));
        }

        public function testDeletarProduto():void{

            $this->assertTrue($pc->deletarProduto(1));
        }

        public function testEditarProduto():void{

            $this->assertTrue($pc->editarProduto(1,"Celular","1000",10,"Xiaomi"));
        }


    }


?>