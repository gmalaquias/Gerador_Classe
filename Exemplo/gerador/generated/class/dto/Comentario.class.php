<?php
	/**
	 * Object represents table 'comentario'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class Comentario{
		
		private $idcomentario;
		private $idprodutosComentario;
		private $userIduser;
		private $comentario;
		private $titulo;
		private $data;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>