<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 14/03/2018
 * Time: 14:21
 */

include "../app/model/Conexao.php";
include "../app/model/ProdutoCrud.php";

$prod = new ProdutoCrud();

$produtos = $prod->getProdutos();

$id3 = $prod->getProduto(4);

$id3->setDescricao(utf8_decode('Eletrodoméstico'));
$id3->setNome(utf8_decode('Eletrodomésticos Super massa'));


$prod->updateProduto($id3);

$prod->insertProduto($id3);

$prod->deleteProduto(3);