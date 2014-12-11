<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface TamanhoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tamanho 
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
 	 * @param tamanho primary key
 	 */
	public function delete($idtamanho);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tamanho tamanho
 	 */
	public function insert($tamanho);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tamanho tamanho
 	 */
	public function update($tamanho);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTamanho($value);

	public function queryByProdutosIdprodutos($value);


	public function deleteByTamanho($value);

	public function deleteByProdutosIdprodutos($value);


}
?>