<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
interface UserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return User 
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
 	 * @param user primary key
 	 */
	public function delete($iduser);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param User user
 	 */
	public function insert($user);
	
	/**
 	 * Update record in table
 	 *
 	 * @param User user
 	 */
	public function update($user);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByDataNasc($value);

	public function queryByCpf($value);

	public function queryByEndereco($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByEstado($value);

	public function queryByComplemento($value);

	public function queryByTelefone($value);

	public function queryBySexo($value);

	public function queryByDataCadastro($value);

	public function queryByUltimoAcesso($value);

	public function queryByAtivo($value);

	public function queryByThumb($value);

	public function queryByStatus($value);

	public function queryByEmail($value);

	public function queryBySenha($value);

	public function queryByNumero($value);


	public function deleteByNome($value);

	public function deleteByDataNasc($value);

	public function deleteByCpf($value);

	public function deleteByEndereco($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByEstado($value);

	public function deleteByComplemento($value);

	public function deleteByTelefone($value);

	public function deleteBySexo($value);

	public function deleteByDataCadastro($value);

	public function deleteByUltimoAcesso($value);

	public function deleteByAtivo($value);

	public function deleteByThumb($value);

	public function deleteByStatus($value);

	public function deleteByEmail($value);

	public function deleteBySenha($value);

	public function deleteByNumero($value);


}
?>