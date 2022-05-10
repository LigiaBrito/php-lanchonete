<?php
require "../model/conexao.php";
require "../model/bebida.php";

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
$preco = isset($_POST['preco']) ? $_POST['preco'] : "";

$objBebida = new Bebida();

$objBebida->setId($id);
$objBebida->setNome($nome);
$objBebida->setDescricao($descricao);
$objBebida->setPreco($preco);

$dadosB = $objBebida->listarTodos($conexao);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $acao = $_GET['acao'];
    if ($acao == 'excluir') {
        if ($objBebida->excluirBebida($conexao, $id))
            header("location:../view/tabelaBebidas.php");
    } elseif ($acao == 'editar') {
        $dadosid = $objBebida->listarPorID($conexao, $id);
        while ($dadosBebida = $dadosid->fetch_object()) {
            $id = $dadosBebida->id;
            $nome = $dadosBebida->nome;
            $descricao = $dadosBebida->descricao;
            $preco = $dadosBebida->preco;
            $edicao = true;
        }
    }
} elseif (isset($_POST['edicao'])) {
    if ($objBebida->editarBebida($conexao, $objBebida))
        header("location:../view/index.php");
    else
        echo "Erro ao inserir!";
} elseif (isset($_POST['codigo'])) {
    if ($objBebida->inserirBebida($conexao, $objBebida))
        header("Refresh:0;url=../view/index.php");
    else
        echo "Erro ao inserir!";
}
