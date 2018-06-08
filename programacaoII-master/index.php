<?php

include_once "app/model/CategoriaCrud.php";
include_once "app/model/ProdutoCrud.php";

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}
switch ($acao){
    case 'index';
        $crud = new CategoriaCrud();
        $categorias = $crud->getCategorias();

        $crudprod = new ProdutoCrud();
        $produtos = $crudprod->getProdutos();

        include '/home/aluno/public_html/revisao-lojinha-master/programacaoII-master/app/views/principal/index.php';
        break;
}

//header('Location: app/controller/categoria.php');