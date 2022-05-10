<!-- MODAL CLIENTE -->

<form action="../controller/clienteController.php" method="post">
	<div class="modal fade" id="modalCliente" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						Cadastro de Clientes
					</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="codigo" name="codigo">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome">
					<label for="endereco">Endereço</label>
					<input type="text" class="form-control" id="endereco" name="endereco">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						Salvar
					</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Fechar
					</button>
				</div>
			</div>
		</div>
	</div>
</form>