<?php
include "header.php";
require "../model/conexao.php";
require "../model/pedido.php";

$objPedido = new Pedido();

$dadosP = $objPedido->listarTodos($conexao);

?>

<body>
	<h1>Relação de Pedidos</h1>
	<?php
	while ($objPed = $dadosP->fetch_object()) {
	?>
		<br><label>Data do pedido:</label>
		<label><?php echo $objPed->data; ?></label>
		<label style="font-weight:bold;"> Total Pedido:</label> <?php echo $objPed->totalPedido; ?>
		<br><label>Nome:</label>
		<label><?php echo $objPed->nome; ?></label>
		<label>Pedido:</label>
		<label><?php echo $objPed->tipoLanche; ?></label>
		<label>Adicionais:</label>
		<label><?php echo $objPed->ckAdicionais; ?></label>
		<label>Bebida:</label>
		<label><?php echo $objPed->tipoBebida; ?></label>
	<?php }
	?>
</body>