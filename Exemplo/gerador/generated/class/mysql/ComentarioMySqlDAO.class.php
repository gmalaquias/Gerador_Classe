<?php
/**
 * Class that operate on table 'comentario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class ComentarioMySqlDAO implements ComentarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ComentarioMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM comentario WHERE idcomentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM comentario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM comentario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param comentario primary key
 	 */
	public function Delete($idcomentario){
		$sql = 'DELETE FROM comentario WHERE idcomentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idcomentario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComentarioMySql comentario
 	 */
	public function Insert($comentario){
		$sql = 'INSERT INTO comentario (idprodutos_comentario, user_iduser, comentario, titulo, data) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($comentario->idprodutosComentario);
		$sqlQuery->setNumber($comentario->userIduser);
		$sqlQuery->set($comentario->comentario);
		$sqlQuery->set($comentario->titulo);
		$sqlQuery->set($comentario->data);

		$id = $this->executeInsert($sqlQuery);	
		$comentario->idcomentario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComentarioMySql comentario
 	 */
	public function Update($comentario){
		$sql = 'UPDATE comentario SET idprodutos_comentario = ?, user_iduser = ?, comentario = ?, titulo = ?, data = ? WHERE idcomentario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($comentario->idprodutosComentario);
		$sqlQuery->setNumber($comentario->userIduser);
		$sqlQuery->set($comentario->comentario);
		$sqlQuery->set($comentario->titulo);
		$sqlQuery->set($comentario->data);

		$sqlQuery->setNumber($comentario->idcomentario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM comentario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdprodutosComentario($value){
		$sql = 'SELECT * FROM comentario WHERE idprodutos_comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserIduser($value){
		$sql = 'SELECT * FROM comentario WHERE user_iduser = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComentario($value){
		$sql = 'SELECT * FROM comentario WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM comentario WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM comentario WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdprodutosComentario($value){
		$sql = 'DELETE FROM comentario WHERE idprodutos_comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserIduser($value){
		$sql = 'DELETE FROM comentario WHERE user_iduser = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComentario($value){
		$sql = 'DELETE FROM comentario WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM comentario WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM comentario WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ComentarioMySql 
	 */
	protected function GetRow($row){
		$comentario = new Comentario();
		
		$comentario->idcomentario = $row['idcomentario'];
		$comentario->idprodutosComentario = $row['idprodutos_comentario'];
		$comentario->userIduser = $row['user_iduser'];
		$comentario->comentario = $row['comentario'];
		$comentario->titulo = $row['titulo'];
		$comentario->data = $row['data'];

		return $comentario;
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
	 * @return ComentarioMySql 
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