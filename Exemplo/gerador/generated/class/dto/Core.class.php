<?php

/**
 * Object represents table 'cores'
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24	 
 */
class Core {

    private $idcores;
    private $cor;
    private $produtosIdprodutos;

    public function __set($var, $val) {
        $this->$var = $val;
    }

    public function __get($var) {
        return $this->$var;
    }

}

?>