<?php
	/**
	 * Object represents table 'user'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2014-06-28 01:24	 
	 */
	class User{
		
		private $iduser;
		private $nome;
		private $dataNasc;
		private $cpf;
		private $endereco;
		private $bairro;
		private $cidade;
		private $estado;
		private $complemento;
		private $telefone;
		private $sexo;
		private $dataCadastro;
		private $ultimoAcesso;
		private $ativo;
		private $thumb;
		private $status;
		private $email;
		private $senha;
		private $numero;
	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>