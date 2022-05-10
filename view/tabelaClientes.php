<?php
require "header.php";
require "modalCliente.php";
require "../controller/clienteController.php";
?>

<body>
    <div class="container-fluid">
        <h1 class="d-flex justify-content-center">Cadastro de Clientes</h1>
        <a href="index.php" class="btn btn-outline-danger">Voltar</a>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCliente">Cadastrar</button>
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($objcli = $dados->fetch_object()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $objcli->id; ?></th>
                            <td><?php echo $objcli->nome; ?></td>
                            <td><?php echo $objcli->endereco; ?></td>
                            <td><?php echo $objcli->telefone; ?></td>
                            <td><a href="editarCliente.php?id=<?php echo $objcli->id ?>&acao=editar">
                                    Editar | </a>
                                <a href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este cliente?'))location.href='../controller/clienteController.php?id=<?php echo $objcli->id ?>&acao=excluir'">
                                    Excluir </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/scripts.js"></script>

</body>


</html>