<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface ProdutosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Produtos 
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
 	 * @param produto primary key
 	 */
	public function delete($idprodutos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Produtos produto
 	 */
	public function insert($produto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Produtos produto
 	 */
	public function update($produto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMarcaIdmarca($value);

	public function queryByThumb($value);

	public function queryByNome($value);

	public function queryBySlug($value);

	public function queryByDescricao($value);

	public function queryByPeso($value);

	public function queryByStatus($value);

	public function queryByDest($value);

	public function queryByData($value);

	public function queryByCatIdcat($value);

	public function queryByImg2($value);

	public function queryByImg3($value);

	public function queryByImg4($value);


	public function deleteByMarcaIdmarca($value);

	public function deleteByThumb($value);

	public function deleteByNome($value);

	public function deleteBySlug($value);

	public function deleteByDescricao($value);

	public function deleteByPeso($value);

	public function deleteByStatus($value);

	public function deleteByDest($value);

	public function deleteByData($value);

	public function deleteByCatIdcat($value);

	public function deleteByImg2($value);

	public function deleteByImg3($value);

	public function deleteByImg4($value);


}
?>