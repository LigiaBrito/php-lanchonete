<?php
session_start();
include "header.php";
require "modalProduto.php";
require "modalCliente.php";
require "../model/conexao.php";
require "../model/pedido.php";
require "../controller/clienteController.php";
require "../controller/lancheController.php";
require "../controller/bebidaController.php";
require "../controller/adicionalController.php";

if ($_POST) {
	$cod = $_POST['cod'];
	$nome = $_POST['nomeCliente'];
	$tipoLanche = $_POST['tipoLanche'];
	$adicionais = $_POST['adicionais'];
	$bebida = $_POST['bebida'];
	$bebidaGelada = $_POST['bebidaGelada'];
	$tipoBebida = $_POST['tipoBebida'];
	$observacoes = $_POST['observacoes'];
	$ckAdicionais = $_POST['ckAdicionais'];
	$data = $_POST['data'];

	$totalPedido = 0;

	$objL = new Lanche();
	$totalPedido += $objL->mostrarPrecoPorNome($conexao, $tipoLanche);

	$objB = new Bebida();
	$totalPedido += $objB->mostrarPrecoPorNome($conexao, $tipoBebida);

	$objA = new Adicional();

	foreach ($ckAdicionais as $tipoAdicional) :
		$totalPedido += $objA->mostrarPrecoPorNome($conexao, $tipoAdicional);
	endforeach;

	if (isset($_POST['fecharPedido'])) {

		$_SESSION['nomeCliente'] = $_POST['nomeCliente'];
		$_SESSION['tipoLanche'] = $_POST['tipoLanche'];
		$_SESSION['tipoBebida'] = $_POST['tipoBebida'];
		$_SESSION['data'] = $_POST['data'];
		$_SESSION['ckAdicionais'] = $_POST['ckAdicionais'];
		$_SESSION['totalPedido'] = $totalPedido;

		$objPedido = new Pedido();

		$objPedido->setCod($cod);
		$objPedido->setNome($nome);
		$objPedido->setTipoLanche($tipoLanche);
		$objPedido->setAdicionais($adicionais);
		$objPedido->setBebida($bebida);
		$objPedido->setBebidaGelada($bebidaGelada);
		$objPedido->setTipoBebida($tipoBebida);
		$objPedido->setObservacoes($observacoes);
		$objPedido->setCkAdicionais($ckAdicionais);
		$objPedido->setData($data);


		$objPedido->setTotalPedido($totalPedido);

		if (isset($_POST['codigoForm'])) {
			if ($objPedido->inserirPedido($conexao, $objPedido) == false)
				echo "Erro ao inserir!";
		}
	}
}
?>

<body>
	<form action="index.php" method="POST" id="frmPedido">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- NAVEGAÇÃO -->
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<img src="../public/img/Icon_foodservice.jpg" width="70px" alt="LOGO">
						</li>
						<li class="nav-item">
							<input type="reset" name="novoPedido" value="Novo" style="color:#25B6FF;" class="nav-link">
						</li>
						<li class="nav-item">
							<input type="submit" name="fecharPedido" value="Fechar Pedido" style="color:#25B6FF;" class="nav-link">
						</li>
						<li class="nav-item">
							<div class="dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdownMenuButton" data-toggle="dropdown">Cadastro</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="tabelaClientes.php">Clientes</a>
									<a class="dropdown-item" href="tabelaBebidas.php">Bebidas</a>
									<a class="dropdown-item" href="tabelaLanches.php">Lanches</a>
									<a class="dropdown-item" href="tabelaAdicionais.php">Adicionais</a>
								</div>
							</div>
						</li>

						<li class="nav-item">
							<div class="dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdownMenuButton" data-toggle="dropdown">Relatórios</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="relatorioPedidoAtual.php">Pedido Atual</a>
									<a class="dropdown-item" href="relatorioTodosPedidos.php">Todos Pedidos</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<!-- FORMULARIO -->
			<div class="row">
				<div class="col-8">
					<input type="hidden" id="codigoForm" name="codigoForm">
					<!-- Input de dados -->
					<fieldset>
						<legend>Dados</legend>
						<div class="form-group row">
							<label>Código de Pedido</label>
							<input type="number" class="form-control" id="cod" name="cod" value="<?php if (isset($_POST['novoPedido'])) echo $novoCod; ?>">
						</div>
						<div class="form-group row">
							<label>Nome do cliente</label>
							<select class="form-control col-sm-11" id="nomeCliente" name="nomeCliente">
								<?php
								while ($objcli = $dados->fetch_object()) {
								?>
									<option><?php echo $objcli->nome; ?></option>
								<?php } ?>
							</select>
							<button href="#modalCliente" type="button" class="btn btn-md btn-outline-info" data-toggle="modal">+</button>
						</div>
					</fieldset>

					<!-- Input de lanches -->
					<div class="row">
						<div class="col">
							<fieldset>
								<legend>Tipos de Lanche</legend>
								<div class="form-group row">
									<select class="form-control col-sm-10" id="tipoLanche" name="tipoLanche">
										<?php
										while ($objlan = $dadosL->fetch_object()) {
										?>
											<option><?php echo $objlan->nome; ?></option>
										<?php } ?>
									</select>
									<button href="#modalLanche" type="button" class="btn btn-md btn-outline-info" data-toggle="modal">+</button>
								</div>

							</fieldset>
						</div>
						<!-- Radio button de adicionais -->
						<fieldset class="col">
							<legend>Adicionais</legend>
							<div class="form-group">
								<input type="radio" id="adSim" name="adicionais" value="Sim">
								<label for="adSim">Sim</label>
								<input type="radio" id="adNao" name="adicionais" value="Não">
								<label for="adNao">Não</label>
								<button href="#modalAdicionais" type="button" class="btn btn-md btn-outline-info" data-toggle="modal">+</button>
							</div>
						</fieldset>
					</div>

					<!-- Input das bebidas-->
					<div class="row">
						<div class="col-3">
							<fieldset>
								<legend>Bebidas</legend>
								<div class="form-group">
									<input type="radio" id="bebSim" name="bebida" value="Sim">
									<label for="bebSim">Sim</label>
									<input type="radio" id="bebNao" name="bebida" value="Não">
									<label for="bebNao">Não</label>
								</div>
							</fieldset>
							<fieldset>
								<legend>Tipos de Bebida</legend>
								<div class="form-group row">
									<select class="form-control col-sm-11" id="tipoBebida" name="tipoBebida">
										<?php
										while ($objBeb = $dadosB->fetch_object()) {
										?>
											<option><?php echo $objBeb->nome; ?></option>
										<?php } ?>
									</select>
									<button href="#modalBebida" type="button" class="btn btn-md btn-outline-info" data-toggle="modal">+</button>
								</div>
							</fieldset>
						</div>

						<div class="col-4">
							<fieldset>
								<legend>Bebidas Gelada?</legend>
								<div class="form-group">
									<input type="radio" id="bebGeladaSim" name="bebidaGelada" value="Sim">
									<label for="bebGeladaSim">Sim</label>
									<input type="radio" id="bebGeladaNao" name="bebidaGelada" value="Não">
									<label for="bebGeladaNao">Não</label>
								</div>
							</fieldset>
							<fieldset>
								<legend>Observações</legend>
								<div class="form-group">
									<textarea id="observacoes" class="col" rows="2" id="observacoes" name="observacoes"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-4">
							<fieldset>
								<legend>Adicionais</legend>
								<div class="form-group">
									<?php
									while ($objAdi = $dadosA->fetch_object()) {
									?>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="ckAdicionais[]" value="<?php echo $objAdi->nome; ?>"> <?php echo $objAdi->nome; ?>
											</label>
										</div>
									<?php } ?>
								</div>
							</fieldset>

						</div>
						<div class="col-4">
							<fieldset>
								<legend>Data do Pedido</legend>
								<div class="form-group">
									Data do pedido:
									<input type="date" id="start" name="data" id="data">

								</div>
							</fieldset>

						</div>
					</div>
				</div>
				<!-- TELA PEDIDOS -->
				<div class="col-4">
					<div>
						<fieldset>
							<legend>Pedidos</legend>
							<textarea id="dadosPedido" class="col" rows="20" disabled><?php if (isset($_POST['fecharPedido'])) {
																							echo "Nome:" . $nome;
																							echo "\nPedido:" . $cod;
																							echo "\nLanche: " . $tipoLanche;
																							echo "\nAdicionais: " . $adicionais;
																							echo "\nBebida: " . $bebida;
																							echo "\nBebida Gelada: " . $bebidaGelada;
																							echo "\nTipo Bebida: " . $tipoBebida;
																							echo "\nObservações: " . $observacoes;
																							echo "\nAdicionais escolhidos:";
																							foreach ($ckAdicionais as $valor) :
																								echo "\n " . $valor;
																							endforeach;
																							echo "\nTotal Do Pedido: " . $totalPedido;
																						} ?></textarea>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- CONFIGURAÇÕES  -->
	<lt class="btn-md btn-outline-info">
		<lt class="lt-highlighter__wrapper">
			<lt class="lt-highlighter__scrollElement">
			</lt>
		</lt>
	</lt>

	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
	<script src="../public/js/scripts.js"></script>
</body>

</html>