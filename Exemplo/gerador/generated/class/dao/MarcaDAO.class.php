<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface MarcaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Marca 
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
 	 * @param marca primary key
 	 */
	public function delete($idmarca);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Marca marca
 	 */
	public function insert($marca);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Marca marca
 	 */
	public function update($marca);	

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