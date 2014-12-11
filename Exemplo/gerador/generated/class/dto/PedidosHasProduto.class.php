<?php
	/**
	 * Object represents table 'pedidos_has_produtos'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class PedidosHasProduto{
		
		private $id;
		private $pedidosIdpedidos;
		private $produtosIdprodutos;
		private $preco;
		private $qtd;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>