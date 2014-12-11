<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface CoresDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cores 
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
 	 * @param core primary key
 	 */
	public function delete($idcores);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cores core
 	 */
	public function insert($core);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cores core
 	 */
	public function update($core);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCor($value);

	public function queryByProdutosIdprodutos($value);


	public function deleteByCor($value);

	public function deleteByProdutosIdprodutos($value);


}
?>