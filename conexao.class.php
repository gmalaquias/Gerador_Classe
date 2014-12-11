<?php
include "../../system/config/config.php";

class conexao extends PDO {
 
    private static $instancia;
 
    public function Conexao($dsn, $username = "", $password = "") {
        // O construtro abaixo é o do PDO
        parent::__construct($dsn, $username, $password);
    }
 
    public static function getInstance() {
        // Se o a instancia não existe eu faço uma
        if(!isset( self::$instancia )){
            try {
                self::$instancia = new Conexao("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch ( Exception $e ) {
                echo 'Erro ao conectar';
                exit ();
            }
        }
        // Se já existe instancia na memória eu retorno ela
        return self::$instancia;
    }
}

?>