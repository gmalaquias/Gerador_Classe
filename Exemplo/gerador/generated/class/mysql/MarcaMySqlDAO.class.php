<?php
/**
 * Class that operate on table 'marca'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class MarcaMySqlDAO implements MarcaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MarcaMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM marca WHERE idmarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM marca';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM marca ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param marca primary key
 	 */
	public function Delete($idmarca){
		$sql = 'DELETE FROM marca WHERE idmarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idmarca);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MarcaMySql marca
 	 */
	public function Insert($marca){
		$sql = 'INSERT INTO marca (nome, slug, image) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($marca->nome);
		$sqlQuery->set($marca->slug);
		$sqlQuery->set($marca->image);

		$id = $this->executeInsert($sqlQuery);	
		$marca->idmarca = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MarcaMySql marca
 	 */
	public function Update($marca){
		$sql = 'UPDATE marca SET nome = ?, slug = ?, image = ? WHERE idmarca = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($marca->nome);
		$sqlQuery->set($marca->slug);
		$sqlQuery->set($marca->image);

		$sqlQuery->setNumber($marca->idmarca);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM marca';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM marca WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySlug($value){
		$sql = 'SELECT * FROM marca WHERE slug = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImage($value){
		$sql = 'SELECT * FROM marca WHERE image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM marca WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySlug($value){
		$sql = 'DELETE FROM marca WHERE slug = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImage($value){
		$sql = 'DELETE FROM marca WHERE image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MarcaMySql 
	 */
	protected function GetRow($row){
		$marca = new Marca();
		
		$marca->idmarca = $row['idmarca'];
		$marca->nome = $row['nome'];
		$marca->slug = $row['slug'];
		$marca->image = $row['image'];

		return $marca;
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
	 * @return MarcaMySql 
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