<?php
require "header.php";
require "modalProduto.php";
require "../controller/adicionalController.php";
?>

<body>
    <div class="container-fluid">
        <h1 class="d-flex justify-content-center">Cadastro de Adicionais</h1>
        <a href="index.php" class="btn btn-outline-danger">Voltar</a>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdicionais">Cadastrar</button>
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($objcli = $dadosA->fetch_object()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $objcli->id; ?></th>
                            <td><?php echo $objcli->nome; ?></td>
                            <td><?php echo $objcli->descricao; ?></td>
                            <td><?php echo $objcli->preco; ?></td>
                            <td><a href="editarProduto.php?id=<?php echo $objcli->id ?>&acao=editar">
                                    Editar | </a>
                                <a href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este adicional?'))location.href='../controller/adicionalController.php?id=<?php echo $objcli->id ?>&acao=excluir'">
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