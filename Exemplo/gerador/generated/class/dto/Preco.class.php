<?php
	/**
	 * Object represents table 'precos'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class Preco{
		
		private $idprecos;
		private $idprodutosPrecos;
		private $data;
		private $preco;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>