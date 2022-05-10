<?php
require "../model/conexao.php";
require "../model/lanche.php";

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
$preco = isset($_POST['preco']) ? $_POST['preco'] : "";

$objLanche = new Lanche();

$objLanche->setId($id);
$objLanche->setNome($nome);
$objLanche->setDescricao($descricao);
$objLanche->setPreco($preco);

$dadosL = $objLanche->listarTodos($conexao);

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao == 'excluir') {
        if ($objLanche->excluirLanche($conexao, $id))
            header("location:../view/tabelaLanches.php");
    } elseif ($acao == 'editar') {
        $dadosid = $objLanche->listarPorID($conexao, $id);
        while ($dadosLanche = $dadosid->fetch_object()) {
            $id = $dadosLanche->id;
            $nome = $dadosLanche->nome;
            $descricao = $dadosLanche->descricao;
            $preco = $dadosLanche->preco;
            $edicao = true;
        }
    }
} elseif (isset($_POST['edicao'])) {
    if ($objLanche->editarLanche($conexao, $objLanche))
        header("location:../view/index.php");
    else
        echo "Erro ao inserir!";
} elseif (isset($_POST['codigo'])) {
    if ($objLanche->inserirLanche($conexao, $objLanche))
        header("Refresh:0;url=../view/index.php");
    else
        echo "Erro ao inserir!";
}
