<?php
	/**
	 * Object represents table 'tamanho'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class Tamanho{
		
		private $idtamanho;
		private $tamanho;
		private $produtosIdprodutos;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>