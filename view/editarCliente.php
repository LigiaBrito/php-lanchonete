<?php
require "../controller/clienteController.php";
require "header.php";
?>

<body>
    <div class="container-fluid">
        <form action="../controller/clienteController.php" method="post">
            <input type="hidden" name="edicao" value=<?php echo $edicao; ?>>
            <label for="id">Código</label>
            <input type="number" class="form-control" id="id" name="id" value=<?php echo $id; ?>>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value=<?php echo $nome; ?>>
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value=<?php echo $endereco; ?>>
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value=<?php echo $telefone; ?>>
            <button type="reset" class="btn btn-secondary">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>

</html>