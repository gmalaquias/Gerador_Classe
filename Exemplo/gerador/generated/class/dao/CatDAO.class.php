<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface CatDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cat 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param cat primary key
 	 */
	public function delete($idcat);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cat cat
 	 */
	public function insert($cat);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cat cat
 	 */
	public function update($cat);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryBySlug($value);

	public function queryByImage($value);


	public function deleteByNome($value);

	public function deleteBySlug($value);

	public function deleteByImage($value);


}
?>