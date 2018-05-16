<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 26/04/2018
 * Time: 16:08
 */

    require_once "../model/ProdutoCrud.php";
    require_once "../model/Produto.php";

    $produtoCRUD = new ProdutoCrud();

    if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }

    switch ($action){
        case 'index':
            $produtos = $produtoCRUD->getProdutos();
            include '../views/templates/header.php';
            include '../views/produtos/index.php';
            include '../views/templates/footer.php';
            break;

        case 'show':

            $produto = $produtoCRUD->getProduto($_GET['id']);
            include '../views/templates/header.php';
            include '../views/produtos/show.php';
            include '../views/templates/footer.php';

            break;

        case 'inserir':
            include '../views/templates/header.php';

            $action = 'inserir';

            if (isset($_POST['gravar'])){
                $validacao = [];
                $mensagem = '';
                if ($_POST['nome'] != "" and $_POST['descricao'] != "" ){
                    $produto = new Produto();
                    $produto->setNome($_POST['nome']);
                    $produto->setDescricao($_POST['descricao']);

                    $crud = new ProdutoCrud();
                    $crud->insertProduto($produto);

                    $mensagem = 'Produto inserido com sucesso!';

                } elseif($_POST['nome'] == "" and $_POST['descricao'] == ""){
                    $mensagem = 'Favor inserir um nome e uma descrição!';
                    $validacao = [
                        'nome' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir um nome!'
                        ],
                        'desc' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir uma descrição!'
                        ]
                    ];
                } elseif ($_POST['nome'] == ""){
                    $mensagem = 'Favor inserir um nome!';
                    $validacao = [
                        'nome' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir um nome!'
                        ]
                    ];

                    $value = [
                        'desc' => $_POST['descricao']
                    ];
                } elseif ($_POST['descricao'] == ""){
                    $mensagem = 'Favor inserir uma descrição!';
                    $validacao = [
                        'desc' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir uma descrição!'
                        ]
                    ];

                    $value = [
                        'nome' => $_POST['nome']
                    ];
                }
                include '../views/templates/mensage.php';
            }


            include '../views/categorias/inserir.php';
            include '../views/templates/footer.php';

            break;

        case 'editar':
            include '../views/templates/header.php';



            $produto = new CategoriaCrud();
            $produto = $produto->getCategoria($_GET['id']);

            $action = 'editar&id=' . $_GET['id'];

            $value = [
                'nome' => $produto->getNome(),
                'desc' => $produto->getDescricao()
            ];


            if (isset($_POST['gravar'])){
                $validacao = [];
                $mensagem = '';
                if ($_POST['nome'] != "" and $_POST['descricao'] != "" ){
                    $produto->setNome($_POST['nome']);
                    $produto->setDescricao($_POST['descricao']);

                    $crud = new CategoriaCrud();
                    $crud->updateCategoria($produto);

                    $mensagem = 'Categoria editada com sucesso!';

                } elseif($_POST['nome'] == "" and $_POST['descricao'] == ""){
                    $mensagem = 'Favor inserir um nome e uma descrição!';
                    $validacao = [
                        'nome' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir um nome!'
                        ],
                        'desc' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir uma descrição!'
                        ]
                    ];
                } elseif ($_POST['nome'] == ""){
                    $mensagem = 'Favor inserir um nome!';
                    $validacao = [
                        'nome' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir um nome!'
                        ]
                    ];

                    $value = [
                        'desc' => $_POST['descricao']
                    ];
                } elseif ($_POST['descricao'] == ""){
                    $mensagem = 'Favor inserir uma descrição!';
                    $validacao = [
                        'desc' => [
                            'input' => 'is-invalid',
                            'text'  => 'Por favor inserir uma descrição!'
                        ]
                    ];

                    $value = [
                        'nome' => $_POST['nome']
                    ];
                }
                include '../views/templates/mensage.php';
            }

            include '../views/categorias/inserir.php';
            include '../views/templates/footer.php';

            break;

        case 'excluir':

            $categoriaCrud = new CategoriaCrud();
            $categoriaCRUD->deleteCategoria($_GET['id']);
            $mensagem = 'Categoria excluída com sucesso!';

            $categorias = $categoriaCRUD->getCategorias();
            include '../views/templates/header.php';
            include '../views/categorias/index.php';
            include '../views/templates/footer.php';

            include '../views/templates/mensage.php';

            break;
    }
