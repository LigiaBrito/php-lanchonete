<?php

class Cliente
{

    private $id;
    private $nome;
    private $endereco;
    private $telefone;

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

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function listarTodos($conexao)
    {
        $sqlstring = "Select * from cliente";
        $dados = $conexao->query($sqlstring);
        return $dados;
    }

    public function fecharConexao($conexao, $dados = NULL)
    {
        if ($dados != null)
            $dados->free_result();
        $conexao->close();
    }

    public function inserirCliente($conexao, $obj)
    {
        $sqlstring = "Insert into cliente(id, nome, endereco, telefone) values
        (NULL, '$obj->nome', '$obj->endereco', '$obj->telefone')";
        if ($conexao->query($sqlstring))
            return true;
    }

    public function listarPorID($conexao, $id)
    {
        $sqlstring = "Select * from cliente where id = $id";
        $dados = $conexao->query($sqlstring);
        return $dados;
    }

    public function editarCliente($conexao, $obj)
    {
        $sqlstring = "Update cliente set nome = '$obj->nome', endereco = '$obj->endereco',
                      telefone = '$obj->telefone' where id = $obj->id";
        if ($conexao->query($sqlstring))
            return true;
    }

    public function excluirCliente($conexao, $id)
    {
        $sqlstring = "delete from cliente where id = $id";
        if ($conexao->query($sqlstring))
            return true;
    }
}
