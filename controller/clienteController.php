<?php
require "../model/conexao.php";
require "../model/cliente.php";

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "";
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "";

$objCliente = new Cliente();

$objCliente->setId($id);
$objCliente->setNome($nome);
$objCliente->setEndereco($endereco);
$objCliente->setTelefone($telefone);

$dados = $objCliente->listarTodos($conexao);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $acao = $_GET['acao'];

    if ($acao == 'excluir') {
        if ($objCliente->excluirCliente($conexao, $id))
            header("location:../view/tabelaClientes.php");
    } elseif ($acao == 'editar') {
        $dadosid = $objCliente->listarPorID($conexao, $id);
        while ($dadosCliente = $dadosid->fetch_object()) {
            $id = $dadosCliente->id;
            $nome = $dadosCliente->nome;
            $endereco = $dadosCliente->endereco;
            $telefone = $dadosCliente->telefone;
            $edicao = true;
        }
    }
} elseif (isset($_POST['edicao'])) {
    if ($objCliente->editarCliente($conexao, $objCliente))
        header("location:../view/index.php");
    else
        echo "Erro ao inserir!";
} elseif (isset($_POST['codigo'])) {
    if ($objCliente->inserirCliente($conexao, $objCliente))
        header("Refresh:0;url=../view/index.php");
    else
        echo "Erro ao inserir!";
}
