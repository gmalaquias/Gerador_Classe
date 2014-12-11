<?php
/**
 * Class that operate on table 'produtos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class ProdutosMySqlDAO implements ProdutosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProdutosMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM produtos WHERE idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM produtos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM produtos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param produto primary key
 	 */
	public function Delete($idprodutos){
		$sql = 'DELETE FROM produtos WHERE idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idprodutos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProdutosMySql produto
 	 */
	public function Insert($produto){
		$sql = 'INSERT INTO produtos (marca_idmarca, thumb, nome, slug, descricao, peso, status, dest, data, cat_idcat, img2, img3, img4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($produto->marcaIdmarca);
		$sqlQuery->set($produto->thumb);
		$sqlQuery->set($produto->nome);
		$sqlQuery->set($produto->slug);
		$sqlQuery->set($produto->descricao);
		$sqlQuery->set($produto->peso);
		$sqlQuery->setNumber($produto->status);
		$sqlQuery->setNumber($produto->dest);
		$sqlQuery->set($produto->data);
		$sqlQuery->setNumber($produto->catIdcat);
		$sqlQuery->set($produto->img2);
		$sqlQuery->set($produto->img3);
		$sqlQuery->set($produto->img4);

		$id = $this->executeInsert($sqlQuery);	
		$produto->idprodutos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProdutosMySql produto
 	 */
	public function Update($produto){
		$sql = 'UPDATE produtos SET marca_idmarca = ?, thumb = ?, nome = ?, slug = ?, descricao = ?, peso = ?, status = ?, dest = ?, data = ?, cat_idcat = ?, img2 = ?, img3 = ?, img4 = ? WHERE idprodutos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($produto->marcaIdmarca);
		$sqlQuery->set($produto->thumb);
		$sqlQuery->set($produto->nome);
		$sqlQuery->set($produto->slug);
		$sqlQuery->set($produto->descricao);
		$sqlQuery->set($produto->peso);
		$sqlQuery->setNumber($produto->status);
		$sqlQuery->setNumber($produto->dest);
		$sqlQuery->set($produto->data);
		$sqlQuery->setNumber($produto->catIdcat);
		$sqlQuery->set($produto->img2);
		$sqlQuery->set($produto->img3);
		$sqlQuery->set($produto->img4);

		$sqlQuery->setNumber($produto->idprodutos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM produtos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMarcaIdmarca($value){
		$sql = 'SELECT * FROM produtos WHERE marca_idmarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByThumb($value){
		$sql = 'SELECT * FROM produtos WHERE thumb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM produtos WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySlug($value){
		$sql = 'SELECT * FROM produtos WHERE slug = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM produtos WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeso($value){
		$sql = 'SELECT * FROM produtos WHERE peso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM produtos WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDest($value){
		$sql = 'SELECT * FROM produtos WHERE dest = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM produtos WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCatIdcat($value){
		$sql = 'SELECT * FROM produtos WHERE cat_idcat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImg2($value){
		$sql = 'SELECT * FROM produtos WHERE img2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImg3($value){
		$sql = 'SELECT * FROM produtos WHERE img3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImg4($value){
		$sql = 'SELECT * FROM produtos WHERE img4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMarcaIdmarca($value){
		$sql = 'DELETE FROM produtos WHERE marca_idmarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByThumb($value){
		$sql = 'DELETE FROM produtos WHERE thumb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM produtos WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySlug($value){
		$sql = 'DELETE FROM produtos WHERE slug = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM produtos WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeso($value){
		$sql = 'DELETE FROM produtos WHERE peso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM produtos WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDest($value){
		$sql = 'DELETE FROM produtos WHERE dest = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM produtos WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCatIdcat($value){
		$sql = 'DELETE FROM produtos WHERE cat_idcat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImg2($value){
		$sql = 'DELETE FROM produtos WHERE img2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImg3($value){
		$sql = 'DELETE FROM produtos WHERE img3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImg4($value){
		$sql = 'DELETE FROM produtos WHERE img4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProdutosMySql 
	 */
	protected function GetRow($row){
		$produto = new Produto();
		
		$produto->idprodutos = $row['idprodutos'];
		$produto->marcaIdmarca = $row['marca_idmarca'];
		$produto->thumb = $row['thumb'];
		$produto->nome = $row['nome'];
		$produto->slug = $row['slug'];
		$produto->descricao = $row['descricao'];
		$produto->peso = $row['peso'];
		$produto->status = $row['status'];
		$produto->dest = $row['dest'];
		$produto->data = $row['data'];
		$produto->catIdcat = $row['cat_idcat'];
		$produto->img2 = $row['img2'];
		$produto->img3 = $row['img3'];
		$produto->img4 = $row['img4'];

		return $produto;
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
	 * @return ProdutosMySql 
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