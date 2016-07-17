<?php
//DAO de Serviços
//

public class ServicoDao
{

	public $id_servico;
	public $tipo_servico;
	public $funcionario;
	public $valor;
	public $forma_pagamento;
	public $concluido;
	public $dt_cadastro;
	public $dt_alteracao;
	public $tb_cliente_id_cliente;
	public $dt_entrega;
	public $observacao;
	public $gasto1;
	public $valor1;
	public $gasto2;
	public $valor2;
	public $gasto3;
	public $valor3;
	public $gasto4;
	public $valor4;
	public $gasto5;
	public $valor5;
	public $gasto6;
	public $valor6;
	public $gasto7;
	public $valor7;
	public $gasto8;
	public $valor8;
	public $gasto9;
	public $valor9;

	/* Setters Id_Serviço */
	public setIdServico($id_servico){ $this->id_servico = $id_servico; }
	/* Getters Id_Serviço */
	public getIdServico(){ return $this->id_servico; }


	/* Setters tipo_servico */
	public setTipoServico($tipo_servico){ $this->tipo_servico = $tipo_servico; }
	/* Getters tipo_servico */
	public getTipoServico(){ return $this->tipo_servico; }


	/* Setters funcionario */
	public setFuncionario($funcionario){ $this->funcionario = $funcionario; }
	/* Getters funcionario */
	public getFuncionario(){ return $this->funcionario; }	


	/* Setters valor */
	public setValor($valor){ $this->valor = $valor; }
	/* Getters valor */
	public getValor(){ return $this->valor; }


	/* Setters forma_pagamento */
	public setFormaPagamento($forma_pagamento){ $this->forma_pagamento = $forma_pagamento; }
	/* Getters forma_pagamento */
	public getFormaPagamento(){ return $this->forma_pagamento; }


	/* Setters concluido */
	public setConcluido($concluido){ $this->concluido = $concluido; }
	/* Getters concluido */
	public getConcluido(){ return $this->concluido; }


	/* Setters dt_cadastro */
	public setDataCadastro($dt_cadastro){ $this->dt_cadastro = $dt_cadastro; }
	/* Getters dt_cadastro */
	public getDataCadastro(){ return $this->dt_cadastro; }


	/* Setters dt_alteracao */
	public setDataAlteracao($dt_alteracao){ $this->dt_alteracao = $dt_alteracao; }
	/* Getters dt_alteracao */
	public getDataAlteracao(){ return $this->dt_alteracao; }


	/* Setters tb_cliente_id_cliente */
	public setTbClienteIdCliente($tb_cliente_id_cliente){ $this->tb_cliente_id_cliente = $tb_cliente_id_cliente; }
	/* Getters tb_cliente_id_cliente */
	public getTbClienteIdCliente(){ return $this->tb_cliente_id_cliente; }	


	/* Setters dt_entrega */
	public setDataEntrega($dt_entrega){ $this->dt_entrega = $dt_entrega; }
	/* Getters dt_entrega */
	public getDataEntrega(){ return $this->dt_entrega; }


	/* Setters observacao */
	public setObservacao($observacao){ $this->observacao = $observacao; }
	/* Getters observacao */
	public getObservacao(){ return $this->observacao; }


	/* Setters gasto1 */
	public setGasto1($gasto1){ $this->gasto1 = $gasto1; }
	/* Getters gasto1 */
	public getGasto1(){ return $this->gasto1; }		


	/* Setters valor1 */
	public setValor1($valor1){ $this->valor1 = $valor1; }
	/* Getters valor1 */
	public getValor1(){ return $this->valor1; }	


	/* Setters gasto2 */
	public setGasto2($gasto2){ $this->gasto2 = $gasto2; }
	/* Getters gasto2 */
	public getGasto2(){ return $this->gasto2; }		


	/* Setters valor2 */
	public setValor2($valor2){ $this->valor2 = $valor2; }
	/* Getters valor2 */
	public getValor2(){ return $this->valor2; }		


	/* Setters gasto3 */
	public setGasto3($gasto3){ $this->gasto3 = $gasto3; }
	/* Getters gasto3 */
	public getGasto3(){ return $this->gasto3; }		


	/* Setters valor3 */
	public setValor3($valor3){ $this->valor3 = $valor3; }
	/* Getters valor3 */
	public getValor3(){ return $this->valor3; }		


	/* Setters gasto4 */
	public setGasto4($gasto4){ $this->gasto4 = $gasto4; }
	/* Getters gasto4 */
	public getGasto4(){ return $this->gasto4; }	


	/* Setters valor4 */
	public setValor4($valor4){ $this->valor4 = $valor4; }
	/* Getters valor4 */
	public getValor4(){ return $this->valor4; }		


	/* Setters gasto5 */
	public setGasto5($gasto5){ $this->gasto5 = $gasto5; }
	/* Getters gasto5 */
	public getGasto5(){ return $this->gasto5; }		


	/* Setters valor5 */
	public setValor5($valor5){ $this->valor5 = $valor5; }
	/* Getters valor5 */
	public getValor5(){ return $this->valor5; }		


	/* Setters gasto6 */
	public setGasto6($gasto6){ $this->gasto6 = $gasto6; }
	/* Getters gasto6 */
	public getGasto6(){ return $this->gasto6; }	


	/* Setters valor6 */
	public setValor6($valor6){ $this->valor6 = $valor6; }
	/* Getters valor6 */
	public getValor6(){ return $this->valor6; }		


	/* Setters gasto7 */
	public setGasto7($gasto7){ $this->gasto7 = $gasto7; }
	/* Getters gasto7 */
	public getGasto7(){ return $this->gasto7; }	


	/* Setters valor7 */
	public setValor7($valor7){ $this->valor7 = $valor7; }
	/* Getters valor7 */
	public getValor7(){ return $this->valor7; }		


	/* Setters gasto8 */
	public setGasto8($gasto8){ $this->gasto8 = $gasto8; }
	/* Getters gasto8 */
	public getGasto8(){ return $this->gasto8; }		


	/* Setters valor8 */
	public setValor8($valor8){ $this->valor8 = $valor8; }
	/* Getters valor8 */
	public getValor8(){ return $this->valor8; }		


	/* Setters gasto9 */
	public setGasto9($gasto9){ $this->gasto9 = $gasto9; }
	/* Getters gasto9 */
	public getGasto9(){ return $this->gasto9; }		


	/* Setters valor9 */
	public setValor9($valor9){ $this->valor9 = $valor9; }
	/* Getters valor9 */
	public getValor9(){ return $this->valor9; }		
}
