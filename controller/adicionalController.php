<?php
require "../model/conexao.php";
require "../model/adicional.php";

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
$preco = isset($_POST['preco']) ? $_POST['preco'] : "";

$objAdicional = new Adicional();

$objAdicional->setId($id);
$objAdicional->setNome($nome);
$objAdicional->setDescricao($descricao);
$objAdicional->setPreco($preco);

$dadosA = $objAdicional->listarTodos($conexao);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $acao = $_GET['acao'];
    if ($acao == 'excluir') {
        if ($objAdicional->excluirAdicional($conexao, $id))
            header("location:../view/tabelaAdicionais.php");
    } elseif ($acao == 'editar') {
        $dadosid = $objAdicional->listarPorID($conexao, $id);
        while ($dadosAdicional = $dadosid->fetch_object()) {
            $id = $dadosAdicional->id;
            $nome = $dadosAdicional->nome;
            $descricao = $dadosAdicional->descricao;
            $preco = $dadosAdicional->preco;
            $edicao = true;
        }
    }
} elseif (isset($_POST['edicao'])) {
    if ($objAdicional->editarAdicional($conexao, $objAdicional))
        header("location:../view/index.php");
    else
        echo "Erro ao inserir!";
} elseif (isset($_POST['codigo'])) {
    if ($objAdicional->inserirAdicional($conexao, $objAdicional))
        header("Refresh:0; url=../view/index.php");
    else
        echo "Erro ao inserir!";
}
