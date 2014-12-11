<?php
/**
 * Class that operate on table 'precos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class PrecosMySqlDAO implements PrecosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrecosMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM precos WHERE idprecos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM precos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM precos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param preco primary key
 	 */
	public function Delete($idprecos){
		$sql = 'DELETE FROM precos WHERE idprecos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idprecos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrecosMySql preco
 	 */
	public function Insert($preco){
		$sql = 'INSERT INTO precos (idprodutos_precos, data, preco) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($preco->idprodutosPrecos);
		$sqlQuery->set($preco->data);
		$sqlQuery->set($preco->preco);

		$id = $this->executeInsert($sqlQuery);	
		$preco->idprecos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrecosMySql preco
 	 */
	public function Update($preco){
		$sql = 'UPDATE precos SET idprodutos_precos = ?, data = ?, preco = ? WHERE idprecos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($preco->idprodutosPrecos);
		$sqlQuery->set($preco->data);
		$sqlQuery->set($preco->preco);

		$sqlQuery->setNumber($preco->idprecos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM precos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdprodutosPrecos($value){
		$sql = 'SELECT * FROM precos WHERE idprodutos_precos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM precos WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreco($value){
		$sql = 'SELECT * FROM precos WHERE preco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdprodutosPrecos($value){
		$sql = 'DELETE FROM precos WHERE idprodutos_precos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM precos WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreco($value){
		$sql = 'DELETE FROM precos WHERE preco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrecosMySql 
	 */
	protected function GetRow($row){
		$preco = new Preco();
		
		$preco->idprecos = $row['idprecos'];
		$preco->idprodutosPrecos = $row['idprodutos_precos'];
		$preco->data = $row['data'];
		$preco->preco = $row['preco'];

		return $preco;
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
	 * @return PrecosMySql 
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