<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/02/18
 * Time: 13:38
 */

require_once "Conexao.php";
require_once "Categoria.php";

class CategoriaCrud
{
    private $conexao;

    public function __construct()
    {
        $con = new Conexao();
        $this->conexao = $con->getConexao();
    }

    public function getCategorias(){
        $sql = "SELECT * FROM categoria";

        $categorias = $this->conexao->query($sql);

        $categorias = $categorias->fetchAll(PDO::FETCH_ASSOC);

        $listaCategorias = [];

        foreach ($categorias as $categoria){
            $cat = new Categoria($categoria['nome_categoria'], $categoria['descricao_categoria']);

            $cat->setId($categoria['id_categoria']);

            $listaCategorias[] = $cat;
        }




        return $listaCategorias;
    }

    public function getCategoria($id){
        $sql = "SELECT * FROM categoria WHERE id_categoria = $id";

        $categoria = $this->conexao->query($sql);

        $categoria = $categoria->fetch(PDO::FETCH_ASSOC);

        $cat = new Categoria($categoria['nome_categoria'], $categoria['descricao_categoria']);

        $cat->setId($categoria['id_categoria']);

        return $cat;
    }

    public function insertCategoria(Categoria $categoria){
        $nome = utf8_decode($categoria->getNome());
        $desc = utf8_decode($categoria->getDescricao());

        $sql = "INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('{$nome}', '{$desc}');";

        $this->conexao->exec($sql);
    }

    public function updateCategoria(Categoria $categoria){
        $nome = utf8_decode($categoria->getNome());
        $desc = utf8_decode($categoria->getDescricao());
        $id = $categoria->getID();

        $sql = "UPDATE categoria SET nome_categoria = '{$nome}', descricao_categoria = '{$desc}' WHERE id_categoria = $id";

        $this->conexao->exec($sql);
    }

    public function deleteCategoria($id){

        $sql = "DELETE FROM categoria WHERE id_categoria = $id";

        $this->conexao->exec($sql);
    }


}