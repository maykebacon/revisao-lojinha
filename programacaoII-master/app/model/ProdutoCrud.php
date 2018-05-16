<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/02/18
 * Time: 14:10
 */

require_once "Conexao.php";
require_once "Produto.php";


class ProdutoCrud
{
    private $conexao;

    public function __construct()
    {
        $con = new Conexao();
        $this->conexao = $con->getConexao();
    }

    public function getProdutos(){
        $sql = "SELECT * FROM produto";

        $produtos = $this->conexao->query($sql);

        $produtos = $produtos->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];

        foreach ($produtos as $produto){
            $prod = new Produto();

            $prod->setDescricao($produto['descricao_produto']);
            $prod->setId($produto['id_produto']);
            $prod->setNome($produto['nome_produto']);
            $prod->setFoto($produto['foto_produto']);
            $prod->setPreco($produto['preco_produto']);
            $prod->setCategoria($produto['id_categoria']);

            $listaProdutos[] = $prod;
        }




        return $listaProdutos;
    }

    public function getProduto($id){
        $sql = "SELECT * FROM produto WHERE id_produto = $id";

        $produto = $this->conexao->query($sql);

        $produto = $produto->fetch(PDO::FETCH_ASSOC);

        $prod = new Produto();

        $prod->setDescricao($produto['descricao_produto']);
        $prod->setId($produto['id_produto']);
        $prod->setNome($produto['nome_produto']);
        $prod->setFoto($produto['foto_produto']);
        $prod->setPreco($produto['preco_produto']);
        $prod->setCategoria($produto['id_categoria']);
        

        return $prod;
    }

    /**
     * @param $idCategoria
     * @return array
     */
    public function getProduto_cat($idCategoria)
    {
        $sql = "SELECT * FROM produto WHERE id_categoria = $idCategoria";

        $produtos = $this->conexao->query($sql);

        $produtos = $produtos->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];

        foreach ($produtos as $produto){
            $prod = new Produto();

            $prod->setDescricao($produto['descricao_produto']);
            $prod->setId($produto['id_produto']);
            $prod->setNome($produto['nome_produto']);
            $prod->setFoto($produto['foto_produto']);
            $prod->setPreco($produto['preco_produto']);
            $prod->setCategoria($produto['id_categoria']);

            $listaProdutos[] = $prod;
        }




        return $listaProdutos;
    }

    /**
     * @param Produto $produto
     */
    public function insertProduto(Produto $produto){
        $nome  = utf8_decode($produto->getNome());
        $desc  = utf8_decode($produto->getDescricao());
        $foto  = utf8_decode($produto->getFoto());
        $preco = utf8_decode($produto->getPreco());
        $cat   = utf8_decode($produto->getCategoria());

        $sql = "INSERT INTO produto (nome_produto, descricao_produto, foto_produto, preco_produto, id_categoria) VALUES ('{$nome}', '{$desc}', '{$foto}', '{$preco}', '{$cat}');";

        $this->conexao->exec($sql);
    }

    /**
     * @param Produto $produto
     */
    public function updateProduto(Produto $produto){
        $nome  = utf8_decode($produto->getNome());
        $desc  = utf8_decode($produto->getDescricao());
        $foto  = utf8_decode($produto->getFoto());
        $preco = utf8_decode($produto->getPreco());
        $cat   = utf8_decode($produto->getCategoria());
        $id = $produto->getID();

        $sql = "UPDATE produto SET nome_produto = '$nome', descricao_produto = '$desc', foto_produto = '$foto', preco_produto = '$preco', id_categoria = '$cat' WHERE id_produto = $id";

        $this->conexao->exec($sql);
    }

    /**
     * @param $id
     */
    public function deleteProduto($id){

        $sql = "DELETE FROM produto WHERE id_produto = $id";

        $this->conexao->exec($sql);
    }

}