<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface ImagesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Images 
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
 	 * @param image primary key
 	 */
	public function delete($idimages);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Images image
 	 */
	public function insert($image);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Images image
 	 */
	public function update($image);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdprodutosImages($value);

	public function queryByImage($value);


	public function deleteByIdprodutosImages($value);

	public function deleteByImage($value);


}
?>