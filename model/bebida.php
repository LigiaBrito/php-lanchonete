<?php

class Bebida
{

    private $id;
    private $descricao;
    private $preco;
    private $nome;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of descricao
     */
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

    /**
     * Get the value of preco
     */
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
    public function listarTodos($conexao)
    {
        $sqlstring = "Select * from bebida";
        $dados = $conexao->query($sqlstring);
        return $dados;
    }

    public function fecharConexao($conexao, $dados = NULL)
    {
        if ($dados != null)
            $dados->free_result();
        $conexao->close();
    }

    public function inserirBebida($conexao, $obj)
    {
        $sqlstring = "Insert into bebida(id, nome, descricao, preco) values
        (NULL, '$obj->nome', '$obj->descricao', '$obj->preco')";
        if ($conexao->query($sqlstring))
            return true;
    }

    public function listarPorID($conexao, $id)
    {
        $sqlstring = "Select * from bebida where id = $id";
        $dados = $conexao->query($sqlstring);
        return $dados;
    }

    public function editarBebida($conexao, $obj)
    {
        $sqlstring = "Update bebida set nome = '$obj->nome', descricao = '$obj->descricao',
                      preco = '$obj->preco' where id = $obj->id";
        if ($conexao->query($sqlstring))
            return true;
    }

    public function excluirBebida($conexao, $id)
    {
        $sqlstring = "delete from bebida where id = $id";
        if ($conexao->query($sqlstring))
            return true;
    }

    public function mostrarPrecoPorNome($conexao, $nome)
    {
        $sqlstring = "select preco from bebida where nome = '$nome'";
        $result = mysqli_query($conexao, $sqlstring);

        if (mysqli_affected_rows($conexao) > 0) {
            $registro = mysqli_fetch_array($result);
            $preco = $registro["preco"];
            return $preco;
        } else {
            return 0;
        }
    }
}
