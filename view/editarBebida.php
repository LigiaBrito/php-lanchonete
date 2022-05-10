<?php
require "../controller/bebidaController.php";
require "header.php";
?>

<body>
    <div class="container-fluid">
        <form action="../controller/bebidaController.php" method="post">
            <input type="hidden" name="edicao" value=<?php echo $edicao; ?>>
            <label for="id">Código</label>
            <input type="number" class="form-control" id="id" name="id" value=<?php echo $id; ?>>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value=<?php echo $nome; ?>>
            <label for="descricao">Descricao</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value=<?php echo $descricao; ?>>
            <label for="preco">Preco</label>
            <input type="text" class="form-control" id="preco" name="preco" value=<?php echo $preco; ?>>
            <button type="reset" class="btn btn-secondary"><a href="index.php">Fechar</a></button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>

</html>