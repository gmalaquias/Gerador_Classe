<?php
/**
 * Class that operate on table 'cores'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class CoresMySqlDAO implements CoresDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CoresMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM cores WHERE idcores = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM cores';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM cores ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param core primary key
 	 */
	public function Delete($idcores){
		$sql = 'DELETE FROM cores WHERE idcores = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idcores);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoresMySql core
 	 */
	public function Insert($core){
		$sql = 'INSERT INTO cores (cor, produtos_idprodutos) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($core->cor);
		$sqlQuery->setNumber($core->produtosIdprodutos);

		$id = $this->executeInsert($sqlQuery);	
		$core->idcores = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoresMySql core
 	 */
	public function Update($core){
		$sql = 'UPDATE cores SET cor = ?, produtos_idprodutos = ? WHERE idcores = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($core->cor);
		$sqlQuery->setNumber($core->produtosIdprodutos);

		$sqlQuery->setNumber($core->idcores);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM cores';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCor($value){
		$sql = 'SELECT * FROM cores WHERE cor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProdutosIdprodutos($value){
		$sql = 'SELECT * FROM cores WHERE produtos_idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCor($value){
		$sql = 'DELETE FROM cores WHERE cor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProdutosIdprodutos($value){
		$sql = 'DELETE FROM cores WHERE produtos_idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CoresMySql 
	 */
	protected function GetRow($row){
		$core = new Core();
		
		$core->idcores = $row['idcores'];
		$core->cor = $row['cor'];
		$core->produtosIdprodutos = $row['produtos_idprodutos'];

		return $core;
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
	 * @return CoresMySql 
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