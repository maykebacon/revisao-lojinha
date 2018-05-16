<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/02/18
 * Time: 13:36
 */

include "../app/model/Conexao.php";
include "../app/model/CategoriaCrud.php";
include "../app/model/ProdutoCrud.php";


$con = new Conexao();

$conexao = $con->getConexao();

$cat = new CategoriaCrud();

$prod = new ProdutoCrud();

$id3 = $cat->getCategoria(3);

$id3->setDescricao(utf8_decode('Produtos Eletrodomésticos'));


$cat->updateCategoria($id3);

$cat->insertCategoria($id3);

$cat->deleteCategoria(3);


/*print_r($cat->getCategorias());

echo "\n --- \n";

print_r($cat->getCategoria(3));

echo "\n --- \n";

print_r($prod->getProdutos());

echo "\n --- \n";

print_r($prod->getProduto(8));*/