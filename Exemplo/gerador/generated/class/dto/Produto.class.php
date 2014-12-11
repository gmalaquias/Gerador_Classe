<?php
	/**
	 * Object represents table 'produtos'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class Produto{
		
		private $idprodutos;
		private $marcaIdmarca;
		private $thumb;
		private $nome;
		private $slug;
		private $descricao;
		private $peso;
		private $status;
		private $dest;
		private $data;
		private $catIdcat;
		private $img2;
		private $img3;
		private $img4;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>