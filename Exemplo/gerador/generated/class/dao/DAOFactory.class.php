<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CatDAO
	 */
	public static function getCatDAO(){
		return new CatBDExt();
	}

	/**
	 * @return ComentarioDAO
	 */
	public static function getComentarioDAO(){
		return new ComentarioBDExt();
	}

	/**
	 * @return CoresDAO
	 */
	public static function getCoresDAO(){
		return new CoresBDExt();
	}

	/**
	 * @return ImagesDAO
	 */
	public static function getImagesDAO(){
		return new ImagesBDExt();
	}

	/**
	 * @return MarcaDAO
	 */
	public static function getMarcaDAO(){
		return new MarcaBDExt();
	}

	/**
	 * @return PedidosDAO
	 */
	public static function getPedidosDAO(){
		return new PedidosBDExt();
	}

	/**
	 * @return PedidosHasProdutosDAO
	 */
	public static function getPedidosHasProdutosDAO(){
		return new PedidosHasProdutosBDExt();
	}

	/**
	 * @return PrecosDAO
	 */
	public static function getPrecosDAO(){
		return new PrecosBDExt();
	}

	/**
	 * @return ProdutosDAO
	 */
	public static function getProdutosDAO(){
		return new ProdutosBDExt();
	}

	/**
	 * @return TamanhoDAO
	 */
	public static function getTamanhoDAO(){
		return new TamanhoBDExt();
	}

	/**
	 * @return UserDAO
	 */
	public static function getUserDAO(){
		return new UserBDExt();
	}


}
?>