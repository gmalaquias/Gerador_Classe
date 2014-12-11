<?php
/**
 * Class that operate on table 'pedidos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class PedidosMySqlDAO implements PedidosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PedidosMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM pedidos WHERE idpedidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM pedidos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM pedidos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pedido primary key
 	 */
	public function Delete($idpedidos){
		$sql = 'DELETE FROM pedidos WHERE idpedidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idpedidos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PedidosMySql pedido
 	 */
	public function Insert($pedido){
		$sql = 'INSERT INTO pedidos (user_iduser, endereco, bairro, cidade, estado, complemento, data, status, frete, valor, data_final, obs, cor, tamanho, numero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pedido->userIduser);
		$sqlQuery->set($pedido->endereco);
		$sqlQuery->set($pedido->bairro);
		$sqlQuery->set($pedido->cidade);
		$sqlQuery->set($pedido->estado);
		$sqlQuery->set($pedido->complemento);
		$sqlQuery->set($pedido->data);
		$sqlQuery->setNumber($pedido->status);
		$sqlQuery->set($pedido->frete);
		$sqlQuery->set($pedido->valor);
		$sqlQuery->set($pedido->dataFinal);
		$sqlQuery->set($pedido->obs);
		$sqlQuery->set($pedido->cor);
		$sqlQuery->set($pedido->tamanho);
		$sqlQuery->set($pedido->numero);

		$id = $this->executeInsert($sqlQuery);	
		$pedido->idpedidos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PedidosMySql pedido
 	 */
	public function Update($pedido){
		$sql = 'UPDATE pedidos SET user_iduser = ?, endereco = ?, bairro = ?, cidade = ?, estado = ?, complemento = ?, data = ?, status = ?, frete = ?, valor = ?, data_final = ?, obs = ?, cor = ?, tamanho = ?, numero = ? WHERE idpedidos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pedido->userIduser);
		$sqlQuery->set($pedido->endereco);
		$sqlQuery->set($pedido->bairro);
		$sqlQuery->set($pedido->cidade);
		$sqlQuery->set($pedido->estado);
		$sqlQuery->set($pedido->complemento);
		$sqlQuery->set($pedido->data);
		$sqlQuery->setNumber($pedido->status);
		$sqlQuery->set($pedido->frete);
		$sqlQuery->set($pedido->valor);
		$sqlQuery->set($pedido->dataFinal);
		$sqlQuery->set($pedido->obs);
		$sqlQuery->set($pedido->cor);
		$sqlQuery->set($pedido->tamanho);
		$sqlQuery->set($pedido->numero);

		$sqlQuery->setNumber($pedido->idpedidos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM pedidos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserIduser($value){
		$sql = 'SELECT * FROM pedidos WHERE user_iduser = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM pedidos WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM pedidos WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM pedidos WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM pedidos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComplemento($value){
		$sql = 'SELECT * FROM pedidos WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM pedidos WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM pedidos WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFrete($value){
		$sql = 'SELECT * FROM pedidos WHERE frete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM pedidos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFinal($value){
		$sql = 'SELECT * FROM pedidos WHERE data_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObs($value){
		$sql = 'SELECT * FROM pedidos WHERE obs = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCor($value){
		$sql = 'SELECT * FROM pedidos WHERE cor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTamanho($value){
		$sql = 'SELECT * FROM pedidos WHERE tamanho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM pedidos WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserIduser($value){
		$sql = 'DELETE FROM pedidos WHERE user_iduser = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM pedidos WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM pedidos WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM pedidos WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM pedidos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComplemento($value){
		$sql = 'DELETE FROM pedidos WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM pedidos WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM pedidos WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFrete($value){
		$sql = 'DELETE FROM pedidos WHERE frete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM pedidos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFinal($value){
		$sql = 'DELETE FROM pedidos WHERE data_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObs($value){
		$sql = 'DELETE FROM pedidos WHERE obs = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCor($value){
		$sql = 'DELETE FROM pedidos WHERE cor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTamanho($value){
		$sql = 'DELETE FROM pedidos WHERE tamanho = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM pedidos WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PedidosMySql 
	 */
	protected function GetRow($row){
		$pedido = new Pedido();
		
		$pedido->idpedidos = $row['idpedidos'];
		$pedido->userIduser = $row['user_iduser'];
		$pedido->endereco = $row['endereco'];
		$pedido->bairro = $row['bairro'];
		$pedido->cidade = $row['cidade'];
		$pedido->estado = $row['estado'];
		$pedido->complemento = $row['complemento'];
		$pedido->data = $row['data'];
		$pedido->status = $row['status'];
		$pedido->frete = $row['frete'];
		$pedido->valor = $row['valor'];
		$pedido->dataFinal = $row['data_final'];
		$pedido->obs = $row['obs'];
		$pedido->cor = $row['cor'];
		$pedido->tamanho = $row['tamanho'];
		$pedido->numero = $row['numero'];

		return $pedido;
	}
	
	protected function Query($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PedidosMySql 
	 */
	protected function QueryRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>