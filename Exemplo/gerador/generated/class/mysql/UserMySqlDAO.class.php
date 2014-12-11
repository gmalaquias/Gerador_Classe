<?php
/**
 * Class that operate on table 'user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-28 01:24
 */
class UserMySqlDAO implements UserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UserMySql 
	 */
	public function getById($id){
		$sql = 'SELECT * FROM user WHERE iduser = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function Get(){
		$sql = 'SELECT * FROM user';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function GetOrderBy($orderColumn){
		$sql = 'SELECT * FROM user ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param user primary key
 	 */
	public function Delete($iduser){
		$sql = 'DELETE FROM user WHERE iduser = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iduser);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserMySql user
 	 */
	public function Insert($user){
		$sql = 'INSERT INTO user (nome, data_nasc, cpf, endereco, bairro, cidade, estado, complemento, telefone, sexo, data_cadastro, ultimo_acesso, ativo, thumb, status, email, senha, numero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->nome);
		$sqlQuery->set($user->dataNasc);
		$sqlQuery->set($user->cpf);
		$sqlQuery->set($user->endereco);
		$sqlQuery->set($user->bairro);
		$sqlQuery->set($user->cidade);
		$sqlQuery->set($user->estado);
		$sqlQuery->set($user->complemento);
		$sqlQuery->set($user->telefone);
		$sqlQuery->set($user->sexo);
		$sqlQuery->set($user->dataCadastro);
		$sqlQuery->set($user->ultimoAcesso);
		$sqlQuery->setNumber($user->ativo);
		$sqlQuery->set($user->thumb);
		$sqlQuery->setNumber($user->status);
		$sqlQuery->set($user->email);
		$sqlQuery->set($user->senha);
		$sqlQuery->set($user->numero);

		$id = $this->executeInsert($sqlQuery);	
		$user->iduser = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserMySql user
 	 */
	public function Update($user){
		$sql = 'UPDATE user SET nome = ?, data_nasc = ?, cpf = ?, endereco = ?, bairro = ?, cidade = ?, estado = ?, complemento = ?, telefone = ?, sexo = ?, data_cadastro = ?, ultimo_acesso = ?, ativo = ?, thumb = ?, status = ?, email = ?, senha = ?, numero = ? WHERE iduser = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->nome);
		$sqlQuery->set($user->dataNasc);
		$sqlQuery->set($user->cpf);
		$sqlQuery->set($user->endereco);
		$sqlQuery->set($user->bairro);
		$sqlQuery->set($user->cidade);
		$sqlQuery->set($user->estado);
		$sqlQuery->set($user->complemento);
		$sqlQuery->set($user->telefone);
		$sqlQuery->set($user->sexo);
		$sqlQuery->set($user->dataCadastro);
		$sqlQuery->set($user->ultimoAcesso);
		$sqlQuery->setNumber($user->ativo);
		$sqlQuery->set($user->thumb);
		$sqlQuery->setNumber($user->status);
		$sqlQuery->set($user->email);
		$sqlQuery->set($user->senha);
		$sqlQuery->set($user->numero);

		$sqlQuery->setNumber($user->iduser);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function DeleteAlls(){
		$sql = 'DELETE FROM user';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM user WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataNasc($value){
		$sql = 'SELECT * FROM user WHERE data_nasc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpf($value){
		$sql = 'SELECT * FROM user WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM user WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM user WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM user WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM user WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComplemento($value){
		$sql = 'SELECT * FROM user WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM user WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySexo($value){
		$sql = 'SELECT * FROM user WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCadastro($value){
		$sql = 'SELECT * FROM user WHERE data_cadastro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimoAcesso($value){
		$sql = 'SELECT * FROM user WHERE ultimo_acesso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtivo($value){
		$sql = 'SELECT * FROM user WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByThumb($value){
		$sql = 'SELECT * FROM user WHERE thumb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM user WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM user WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM user WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM user WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM user WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataNasc($value){
		$sql = 'DELETE FROM user WHERE data_nasc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpf($value){
		$sql = 'DELETE FROM user WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM user WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM user WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM user WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM user WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComplemento($value){
		$sql = 'DELETE FROM user WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM user WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySexo($value){
		$sql = 'DELETE FROM user WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCadastro($value){
		$sql = 'DELETE FROM user WHERE data_cadastro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimoAcesso($value){
		$sql = 'DELETE FROM user WHERE ultimo_acesso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtivo($value){
		$sql = 'DELETE FROM user WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByThumb($value){
		$sql = 'DELETE FROM user WHERE thumb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM user WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM user WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM user WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM user WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UserMySql 
	 */
	protected function GetRow($row){
		$user = new User();
		
		$user->iduser = $row['iduser'];
		$user->nome = $row['nome'];
		$user->dataNasc = $row['data_nasc'];
		$user->cpf = $row['cpf'];
		$user->endereco = $row['endereco'];
		$user->bairro = $row['bairro'];
		$user->cidade = $row['cidade'];
		$user->estado = $row['estado'];
		$user->complemento = $row['complemento'];
		$user->telefone = $row['telefone'];
		$user->sexo = $row['sexo'];
		$user->dataCadastro = $row['data_cadastro'];
		$user->ultimoAcesso = $row['ultimo_acesso'];
		$user->ativo = $row['ativo'];
		$user->thumb = $row['thumb'];
		$user->status = $row['status'];
		$user->email = $row['email'];
		$user->senha = $row['senha'];
		$user->numero = $row['numero'];

		return $user;
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
	 * @return UserMySql 
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