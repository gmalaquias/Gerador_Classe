<?php
/**
 * Class that operate on table 'cat'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class CatMySqlDAO implements CatDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CatMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM cat WHERE idcat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM cat';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM cat ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cat primary key
 	 */
	public function Delete($idcat){
		$sql = 'DELETE FROM cat WHERE idcat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idcat);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CatMySql cat
 	 */
	public function Insert($cat){
		$sql = 'INSERT INTO cat (nome, slug, image) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cat->nome);
		$sqlQuery->set($cat->slug);
		$sqlQuery->set($cat->image);

		$id = $this->executeInsert($sqlQuery);	
		$cat->idcat = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CatMySql cat
 	 */
	public function Update($cat){
		$sql = 'UPDATE cat SET nome = ?, slug = ?, image = ? WHERE idcat = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cat->nome);
		$sqlQuery->set($cat->slug);
		$sqlQuery->set($cat->image);

		$sqlQuery->setNumber($cat->idcat);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	

	
	/**
	 * Read row
	 *
	 * @return CatMySql 
	 */
	protected function GetRow($row){
		$cat = new Cat();
		
		$cat->idcat = $row['idcat'];
		$cat->nome = $row['nome'];
		$cat->slug = $row['slug'];
		$cat->image = $row['image'];

		return $cat;
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
	 * @return CatMySql 
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