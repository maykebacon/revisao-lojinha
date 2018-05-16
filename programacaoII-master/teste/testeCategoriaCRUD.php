<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 14/03/2018
 * Time: 13:32
 */

include "../app/model/Conexao.php";
include "../app/model/CategoriaCrud.php";

$cat = new CategoriaCrud();

$categorias = $cat->getCategorias();

$id3 = $cat->getCategoria(4);

$id3->setDescricao(utf8_decode('Produtos Eletrodomésticos'));
$id3->setNome(utf8_decode('Eletrodomésticos'));


$cat->updateCategoria($id3);

/*$cat->insertCategoria($id3);*/

$cat->deleteCategoria(3);