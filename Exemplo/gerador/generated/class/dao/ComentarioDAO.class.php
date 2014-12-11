<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface ComentarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Comentario 
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
 	 * @param comentario primary key
 	 */
	public function delete($idcomentario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Comentario comentario
 	 */
	public function insert($comentario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Comentario comentario
 	 */
	public function update($comentario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdprodutosComentario($value);

	public function queryByUserIduser($value);

	public function queryByComentario($value);

	public function queryByTitulo($value);

	public function queryByData($value);


	public function deleteByIdprodutosComentario($value);

	public function deleteByUserIduser($value);

	public function deleteByComentario($value);

	public function deleteByTitulo($value);

	public function deleteByData($value);


}
?>