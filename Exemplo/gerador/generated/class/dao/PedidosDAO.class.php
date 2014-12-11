<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface PedidosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pedidos 
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
 	 * @param pedido primary key
 	 */
	public function delete($idpedidos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pedidos pedido
 	 */
	public function insert($pedido);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pedidos pedido
 	 */
	public function update($pedido);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserIduser($value);

	public function queryByEndereco($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByEstado($value);

	public function queryByComplemento($value);

	public function queryByData($value);

	public function queryByStatus($value);

	public function queryByFrete($value);

	public function queryByValor($value);

	public function queryByDataFinal($value);

	public function queryByObs($value);

	public function queryByCor($value);

	public function queryByTamanho($value);

	public function queryByNumero($value);


	public function deleteByUserIduser($value);

	public function deleteByEndereco($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByEstado($value);

	public function deleteByComplemento($value);

	public function deleteByData($value);

	public function deleteByStatus($value);

	public function deleteByFrete($value);

	public function deleteByValor($value);

	public function deleteByDataFinal($value);

	public function deleteByObs($value);

	public function deleteByCor($value);

	public function deleteByTamanho($value);

	public function deleteByNumero($value);


}
?>