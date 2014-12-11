<?php
/**
 * Class that operate on table 'pedidos_has_produtos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class PedidosHasProdutosMySqlDAO implements PedidosHasProdutosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PedidosHasProdutosMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM pedidos_has_produtos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM pedidos_has_produtos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM pedidos_has_produtos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pedidosHasProduto primary key
 	 */
	public function Delete($id){
		$sql = 'DELETE FROM pedidos_has_produtos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PedidosHasProdutosMySql pedidosHasProduto
 	 */
	public function Insert($pedidosHasProduto){
		$sql = 'INSERT INTO pedidos_has_produtos (pedidos_idpedidos, produtos_idprodutos, preco, qtd) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pedidosHasProduto->pedidosIdpedidos);
		$sqlQuery->setNumber($pedidosHasProduto->produtosIdprodutos);
		$sqlQuery->set($pedidosHasProduto->preco);
		$sqlQuery->setNumber($pedidosHasProduto->qtd);

		$id = $this->executeInsert($sqlQuery);	
		$pedidosHasProduto->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PedidosHasProdutosMySql pedidosHasProduto
 	 */
	public function Update($pedidosHasProduto){
		$sql = 'UPDATE pedidos_has_produtos SET pedidos_idpedidos = ?, produtos_idprodutos = ?, preco = ?, qtd = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pedidosHasProduto->pedidosIdpedidos);
		$sqlQuery->setNumber($pedidosHasProduto->produtosIdprodutos);
		$sqlQuery->set($pedidosHasProduto->preco);
		$sqlQuery->setNumber($pedidosHasProduto->qtd);

		$sqlQuery->setNumber($pedidosHasProduto->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM pedidos_has_produtos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPedidosIdpedidos($value){
		$sql = 'SELECT * FROM pedidos_has_produtos WHERE pedidos_idpedidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProdutosIdprodutos($value){
		$sql = 'SELECT * FROM pedidos_has_produtos WHERE produtos_idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreco($value){
		$sql = 'SELECT * FROM pedidos_has_produtos WHERE preco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtd($value){
		$sql = 'SELECT * FROM pedidos_has_produtos WHERE qtd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPedidosIdpedidos($value){
		$sql = 'DELETE FROM pedidos_has_produtos WHERE pedidos_idpedidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProdutosIdprodutos($value){
		$sql = 'DELETE FROM pedidos_has_produtos WHERE produtos_idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreco($value){
		$sql = 'DELETE FROM pedidos_has_produtos WHERE preco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtd($value){
		$sql = 'DELETE FROM pedidos_has_produtos WHERE qtd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PedidosHasProdutosMySql 
	 */
	protected function GetRow($row){
		$pedidosHasProduto = new PedidosHasProduto();
		
		$pedidosHasProduto->id = $row['id'];
		$pedidosHasProduto->pedidosIdpedidos = $row['pedidos_idpedidos'];
		$pedidosHasProduto->produtosIdprodutos = $row['produtos_idprodutos'];
		$pedidosHasProduto->preco = $row['preco'];
		$pedidosHasProduto->qtd = $row['qtd'];

		return $pedidosHasProduto;
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
	 * @return PedidosHasProdutosMySql 
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