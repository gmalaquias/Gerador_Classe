<?php
	/**
	 * Object represents table '${table_name}'
	 *
     	 * @author: http://phpdao.com
     	 * @date: ${date}	 
	 */
	class ${domain_class_name}{
		${variables}	
                
                public function __set($var, $val) {
                    $this->$var = $val;
                }

                public function __get($var) {
                    return $this->$var;
                }        
	}
?>