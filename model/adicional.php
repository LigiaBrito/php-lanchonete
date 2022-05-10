<?php

class Adicional{

    private $id;
    private $nome;
    private $descricao;
    private $preco;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;

    }
      /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
    public function listarTodos($conexao){
        $sqlstring = "Select * from adicionais";
        $dados = $conexao->query($sqlstring);
        return $dados;
    }

    public function fecharConexao($conexao, $dados = NULL){
        if($dados != null)
            $dados->free_result();
        $conexao->close();
    }

    public function inserirAdicional($conexao, $obj){
        $sqlstring = "Insert into adicionais(id, nome, descricao, preco) values
        (NULL, '$obj->nome', '$obj->descricao', '$obj->preco')";
        if($conexao->query($sqlstring))
            return true;
    }

    public function listarPorID($conexao, $id){
        $sqlstring = "Select * from adicionais where id = $id";
        $dados = $conexao->query($sqlstring);
        return $dados;
    }

    public function editarAdicional($conexao, $obj){
        $sqlstring = "Update adicionais set nome = '$obj->nome', descricao = '$obj->descricao',
                      preco = '$obj->preco' where id = $obj->id";
        if($conexao->query($sqlstring))
            return true;
    }

    public function excluirAdicional($conexao, $id){
        $sqlstring ="delete from adicionais where id = $id";
        if($conexao->query($sqlstring))
            return true;
    }

    public function mostrarPrecoPorNome($conexao, $nome){
        $sqlstring = "select preco from adicionais where nome = '$nome'";
        $result = mysqli_query($conexao, $sqlstring);
        
        if(mysqli_affected_rows($conexao) > 0){
            $registro = mysqli_fetch_array($result);
            $preco = $registro["preco"];
            return $preco;
	    } else{
            return 0;
        }
    }
}