<?php 
/**
* 
*/
require "conexao.class.php";
class sql extends conexao
{

	private $conecta;

	function __construct(){
		$this->conecta = conexao::getInstance();  
	}  

	function consulta($query) {
		
		
		try{
				$query_select = $this->conecta->prepare($query);
				$query_select->execute();
				return $resultado_query = $query_select->fetchAll(PDO::FETCH_OBJ);
		}catch (PDOexception $error_select){
		echo 'Erro ao selecionar '.$error_select;
		}
	}
        
        function consultaNUMBER($query) {
		
		
		try{
				$query_select = $this->conecta->prepare($query);
				$query_select->execute();
				return $resultado_query = $query_select->fetchAll(PDO::FETCH_NUM);
		}catch (PDOexception $error_select){
		echo 'Erro ao selecionar '.$error_select;
		}
	}
	
	function conta($query) {
		

		try{
		$query_select = $this->conecta->prepare($query);
		$query_select->execute();
		$resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
		$count = count($resultado_query);
		return $count;
		
		}catch (PDOexception $error_select){
		   // echo  'Erro ao contar '.$error_select;
		}
	}
}
