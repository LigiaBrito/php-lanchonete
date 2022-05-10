<!-- Para gerar o pedido atual é necessário Fechar o Pedido primeiro -->
<?php
include "header.php";
session_start();
?>

<body>

    ===========Pedido============
    <br><label>Nome:</label><?php echo $_SESSION['nomeCliente']; ?>
    <br><label>Pedido:</label><?php echo $_SESSION['tipoLanche']; ?>
    <br><label>Adicionais:</label>
    <?php
    foreach ($_SESSION['ckAdicionais'] as $valor) :
        echo $valor . ',';
    endforeach;
    ?>
    <br><label>Bebida:</label><?php echo $_SESSION['tipoBebida']; ?>
    <br><label>Data do Pedido:</label><?php echo $_SESSION['data']; ?>
    <br><label style="font-weight:bold;">Total do Pedido:</label><?php echo $_SESSION['totalPedido']; ?>
</body>

</html>