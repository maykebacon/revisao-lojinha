<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 11/04/2018
 * Time: 13:23
 */

    require_once "../model/CategoriaCrud.php";
    require_once "../model/Categoria.php";

    $categoriaCRUD = new CategoriaCrud();

    if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }

    switch ($action){
        case 'index':
            $categorias = $categoriaCRUD->getCategorias();
            include '../views/templates/header.php';
            include '../views/categorias/index.php';
            include '../views/templates/footer.php';
            break;

        case 'show';
            $categoria = $categoriaCRUD->getCategoria($_GET['id']);
            include '../views/templates/header.php';
            include '../views/categorias/show.php';
            include '../views/templates/footer.php';
            break;

        case 'inserir':
            include '../views/templates/header.php';

            $action = 'inserir';

            if (isset($_POST['gravar'])){
                $validacao = [];
                $mensagem = '';
                if ($_POST['nome'] != "" and $_POST['descricao'] != "" ){
                    $categoria = new Categoria();
                    $categoria->setNome($_POST['nome']);
                    $categoria->setDescricao($_POST['descricao']);

                    $crud = new CategoriaCrud();
                    $crud->insertCategoria($categoria);

                    $mensagem = 'Categoria inserida com sucesso!';

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



            $categoria = new CategoriaCrud();
            $categoria = $categoria->getCategoria($_GET['id']);

            $action = 'editar&id=' . $_GET['id'];

            $value = [
                'nome' => $categoria->getNome(),
                'desc' => $categoria->getDescricao()
            ];


            if (isset($_POST['gravar'])){
                $validacao = [];
                $mensagem = '';
                if ($_POST['nome'] != "" and $_POST['descricao'] != "" ){
                    $categoria->setNome($_POST['nome']);
                    $categoria->setDescricao($_POST['descricao']);

                    $crud = new CategoriaCrud();
                    $crud->updateCategoria($categoria);

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

