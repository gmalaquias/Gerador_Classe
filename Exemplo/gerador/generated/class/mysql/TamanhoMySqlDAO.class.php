<?php
/**
 * Class that operate on table 'tamanho'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class TamanhoMySqlDAO implements TamanhoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TamanhoMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM tamanho WHERE idtamanho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM tamanho';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM tamanho ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tamanho primary key
 	 */
	public function Delete($idtamanho){
		$sql = 'DELETE FROM tamanho WHERE idtamanho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idtamanho);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TamanhoMySql tamanho
 	 */
	public function Insert($tamanho){
		$sql = 'INSERT INTO tamanho (tamanho, produtos_idprodutos) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tamanho->tamanho);
		$sqlQuery->setNumber($tamanho->produtosIdprodutos);

		$id = $this->executeInsert($sqlQuery);	
		$tamanho->idtamanho = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TamanhoMySql tamanho
 	 */
	public function Update($tamanho){
		$sql = 'UPDATE tamanho SET tamanho = ?, produtos_idprodutos = ? WHERE idtamanho = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tamanho->tamanho);
		$sqlQuery->setNumber($tamanho->produtosIdprodutos);

		$sqlQuery->setNumber($tamanho->idtamanho);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM tamanho';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTamanho($value){
		$sql = 'SELECT * FROM tamanho WHERE tamanho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProdutosIdprodutos($value){
		$sql = 'SELECT * FROM tamanho WHERE produtos_idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTamanho($value){
		$sql = 'DELETE FROM tamanho WHERE tamanho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProdutosIdprodutos($value){
		$sql = 'DELETE FROM tamanho WHERE produtos_idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TamanhoMySql 
	 */
	protected function GetRow($row){
		$tamanho = new Tamanho();
		
		$tamanho->idtamanho = $row['idtamanho'];
		$tamanho->tamanho = $row['tamanho'];
		$tamanho->produtosIdprodutos = $row['produtos_idprodutos'];

		return $tamanho;
	}
	
	protected function Query($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TamanhoMySql 
	 */
	protected function QueryRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>