<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface PrecosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Precos 
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
 	 * @param preco primary key
 	 */
	public function delete($idprecos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Precos preco
 	 */
	public function insert($preco);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Precos preco
 	 */
	public function update($preco);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdprodutosPrecos($value);

	public function queryByData($value);

	public function queryByPreco($value);


	public function deleteByIdprodutosPrecos($value);

	public function deleteByData($value);

	public function deleteByPreco($value);


}
?>