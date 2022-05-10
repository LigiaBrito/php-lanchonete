<?php


class Pedido
{

	private $cod;
	private $nome;
	private $tipoLanche;
	private $adicionais;
	private $bebida;
	private $bebidaGelada;
	private $tipoBebida;
	private $observacoes;
	private $ckAdicionais;
	private $data;
	private $totalPedido;

	/**
	 * Get the value of cod
	 */
	public function getCod()
	{
		return $this->cod;
	}

	/**
	 * Set the value of cod
	 *
	 * @return  self
	 */
	public function setCod($cod)
	{
		$this->cod = $cod;

		return $this;
	}

	/**
	 * Get the value of nome
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Set the value of nome
	 *
	 * @return  self
	 */
	public function setNome($nome)
	{
		$this->nome = $nome;

		return $this;
	}

	/**
	 * Get the value of tipoLanche
	 */
	public function getTipoLanche()
	{
		return $this->tipoLanche;
	}

	/**
	 * Set the value of tipoLanche
	 *
	 * @return  self
	 */
	public function setTipoLanche($tipoLanche)
	{
		$this->tipoLanche = $tipoLanche;

		return $this;
	}

	/**
	 * Get the value of adicionais
	 */
	public function getAdicionais()
	{
		return $this->adicionais;
	}

	/**
	 * Set the value of adicionais
	 *
	 * @return  self
	 */
	public function setAdicionais($adicionais)
	{
		$this->adicionais = $adicionais;

		return $this;
	}

	/**
	 * Get the value of bebida
	 */
	public function getBebida()
	{
		return $this->bebida;
	}

	/**
	 * Set the value of bebida
	 *
	 * @return  self
	 */
	public function setBebida($bebida)
	{
		$this->bebida = $bebida;

		return $this;
	}

	/**
	 * Get the value of bebidaGelada
	 */
	public function getBebidaGelada()
	{
		return $this->bebidaGelada;
	}

	/**
	 * Set the value of bebidaGelada
	 *
	 * @return  self
	 */
	public function setBebidaGelada($bebidaGelada)
	{
		$this->bebidaGelada = $bebidaGelada;

		return $this;
	}

	/**
	 * Get the value of tipoBebida
	 */
	public function getTipoBebida()
	{
		return $this->tipoBebida;
	}

	/**
	 * Set the value of tipoBebida
	 *
	 * @return  self
	 */
	public function setTipoBebida($tipoBebida)
	{
		$this->tipoBebida = $tipoBebida;

		return $this;
	}

	/**
	 * Get the value of observacoes
	 */
	public function getObservacoes()
	{
		return $this->observacoes;
	}

	/**
	 * Set the value of observacoes
	 *
	 * @return  self
	 */
	public function setObservacoes($observacoes)
	{
		$this->observacoes = $observacoes;

		return $this;
	}

	/**
	 * Get the value of ckAdicionais
	 */
	public function getCkAdicionais()
	{
		return $this->ckAdicionais;
	}

	/**
	 * Set the value of ckAdicionais
	 *
	 * @return  self
	 */
	public function setCkAdicionais($ckAdicionais)
	{
		$this->ckAdicionais = $ckAdicionais;

		return $this;
	}

	/**
	 * Get the value of data
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Set the value of data
	 *
	 * @return  self
	 */
	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * Get the value of totalPedido
	 */
	public function getTotalPedido()
	{
		return $this->totalPedido;
	}

	/**
	 * Set the value of totalPedido
	 *
	 * @return  self
	 */
	public function setTotalPedido($totalPedido)
	{
		$this->totalPedido = $totalPedido;

		return $this;
	}

	public function listarTodos($conexao)
	{
		$sqlstring = "Select * from pedido";
		$dados = $conexao->query($sqlstring);
		return $dados;
	}

	public function fecharConexao($conexao, $dados = NULL)
	{
		if ($dados != null)
			$dados->free_result();
		$conexao->close();
	}

	public function inserirPedido($conexao, $obj)
	{
		$ckAdicionais = implode(",", $obj->ckAdicionais);
		$sqlstring = "Insert into pedido(id, cod, nome, tipoLanche, adicionais, bebida, bebidaGelada, tipoBebida, data, observacoes, ckAdicionais, totalPedido) values
        (NULL, '$obj->cod', '$obj->nome', '$obj->tipoLanche', '$obj->adicionais','$obj->bebida','$obj->bebidaGelada','$obj->tipoBebida','$obj->data','$obj->observacoes','$ckAdicionais','$obj->totalPedido')";
		if ($conexao->query($sqlstring))
			return true;
	}
}
