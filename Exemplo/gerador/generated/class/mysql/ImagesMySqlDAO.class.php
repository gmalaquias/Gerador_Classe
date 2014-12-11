<?php
/**
 * Class that operate on table 'images'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class ImagesMySqlDAO implements ImagesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ImagesMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM images WHERE idimages = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM images';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM images ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param image primary key
 	 */
	public function Delete($idimages){
		$sql = 'DELETE FROM images WHERE idimages = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idimages);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ImagesMySql image
 	 */
	public function Insert($image){
		$sql = 'INSERT INTO images (idprodutos_images, image) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($image->idprodutosImages);
		$sqlQuery->set($image->image);

		$id = $this->executeInsert($sqlQuery);	
		$image->idimages = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ImagesMySql image
 	 */
	public function Update($image){
		$sql = 'UPDATE images SET idprodutos_images = ?, image = ? WHERE idimages = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($image->idprodutosImages);
		$sqlQuery->set($image->image);

		$sqlQuery->setNumber($image->idimages);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM images';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdprodutosImages($value){
		$sql = 'SELECT * FROM images WHERE idprodutos_images = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImage($value){
		$sql = 'SELECT * FROM images WHERE image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdprodutosImages($value){
		$sql = 'DELETE FROM images WHERE idprodutos_images = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImage($value){
		$sql = 'DELETE FROM images WHERE image = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ImagesMySql 
	 */
	protected function GetRow($row){
		$image = new Image();
		
		$image->idimages = $row['idimages'];
		$image->idprodutosImages = $row['idprodutos_images'];
		$image->image = $row['image'];

		return $image;
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
	 * @return ImagesMySql 
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