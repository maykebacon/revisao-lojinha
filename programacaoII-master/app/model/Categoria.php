<?php

class Categoria{

    private $id;
    private $nome;
    private $descricao;

    public function __construct($nome = '', $descricao = '')
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = utf8_decode($descricao);
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = utf8_decode($nome);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return utf8_encode($this->descricao);
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return utf8_encode($this->nome);
    }

}