<?php
	/**
	 * Object represents table 'pedidos'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class Pedido{
		
		private $idpedidos;
		private $userIduser;
		private $endereco;
		private $bairro;
		private $cidade;
		private $estado;
		private $complemento;
		private $data;
		private $status;
		private $frete;
		private $valor;
		private $dataFinal;
		private $obs;
		private $cor;
		private $tamanho;
		private $numero;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>