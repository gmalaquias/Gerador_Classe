<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface PedidosHasProdutosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PedidosHasProdutos 
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
 	 * @param pedidosHasProduto primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PedidosHasProdutos pedidosHasProduto
 	 */
	public function insert($pedidosHasProduto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PedidosHasProdutos pedidosHasProduto
 	 */
	public function update($pedidosHasProduto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPedidosIdpedidos($value);

	public function queryByProdutosIdprodutos($value);

	public function queryByPreco($value);

	public function queryByQtd($value);


	public function deleteByPedidosIdpedidos($value);

	public function deleteByProdutosIdprodutos($value);

	public function deleteByPreco($value);

	public function deleteByQtd($value);


}
?>