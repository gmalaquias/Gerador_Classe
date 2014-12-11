<?php

/**
 * Object represents table 'images'
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24	 
 */
class Image {

    private $idimages;
    private $idprodutosImages;
    private $image;

    public function __set($var, $val) {
        $this->$var = $val;
    }

    public function __get($var) {
        return $this->$var;
    }

}

?>