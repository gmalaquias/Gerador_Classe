<?php

/**
 * Classe gerada a partir de um Gerador
 *
 * @author Gabriel Malaquias
 * Data: ${Data}
 */

class ${Table}DB {

    private $sql;
    
    function __construct() {
        $this->sql = new sql();
    }
    
    public function getById($id) {        
        $q = "SELECT * FROM ${Table} WHERE ${Primary} = $id";
        $consulta = $this->sql->consulta($q);
        
        if ($this->sql->conta($q) > 0):
                $obj = $this->get($consulta[0]);
            return $obj;
        else:
            return null;
        endif;
    }
    
    protected function get($v){
        if(is_array($v)){
            foreach($v as $l){
                $obj = new ${Table}();
                ${contrucao}
                $r[] = $obj;
            }
            return $r;
        }else{
            $l = $v;
            $obj = new ${Table}();
            ${contrucao}
            return $obj;
        }
    }
}
