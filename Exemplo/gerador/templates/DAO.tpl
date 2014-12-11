<?php
/**
 * Class that operate on table '${table_name}'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: ${date}
 */
class ${dao_clazz_name}DAO implements ${idao_clazz_name}DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ${dao_clazz_name} 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM ${table_name} WHERE ${pk} = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set${pk_number}($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM ${table_name}';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM ${table_name} ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param ${var_name} primary key
 	 */
	public function Delete($${pk}){
		$sql = 'DELETE FROM ${table_name} WHERE ${pk} = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set${pk_number}($${pk});
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ${dao_clazz_name} ${var_name}
 	 */
	public function Insert($${var_name}){
		$sql = 'INSERT INTO ${table_name} (${insert_fields}) VALUES (${question_marks})';
		$sqlQuery = new SqlQuery($sql);
		${parameter_setter}
		$id = $this->executeInsert($sqlQuery);	
		$${var_name}->${pk_php} = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ${dao_clazz_name} ${var_name}
 	 */
	public function Update($${var_name}){
		$sql = 'UPDATE ${table_name} SET ${update_fields} WHERE ${pk} = ?';
		$sqlQuery = new SqlQuery($sql);
		${parameter_setter}
		$sqlQuery->set${pk_number}($${var_name}->${pk_php});
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM ${table_name}';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

${queryByFieldFunctions}
${deleteByFieldFunctions}
	
	/**
	 * Read row
	 *
	 * @return ${dao_clazz_name} 
	 */
	protected function GetRow($row){
		$${var_name} = new ${domain_clazz_name}();
		${read_row}
		return $${var_name};
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
	 * @return ${dao_clazz_name} 
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