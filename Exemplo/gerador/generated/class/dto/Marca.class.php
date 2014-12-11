<?php
	/**
	 * Object represents table 'marca'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class Marca{
		
		private $idmarca;
		private $nome;
		private $slug;
		private $image;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>