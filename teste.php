<?php

include "Class/DB/pessoaDB.class.php";
include "Class/DB/testeDB.class.php";
include "Class/DAL/pessoa.class.php";
include "Class/DAL/teste.class.php";

///*
// * To change this license header, choose License Headers in Project Properties.
// * To change this template file, choose Tools | Templates
// * and open the template in the editor.
// */
//
require_once("sql.class.php");

$pessoa = new pessoa();
echo get_class($pessoa);

$conteudo = new testeDB();
$conteudoObj = $conteudo->getById(2);

var_dump($conteudoObj);

foreach ($conteudoObj as $l) {
    echo $l->idteste;
}

//$_POST['a'] = "gsdjagsd";
//$_POST['nome'] = 'asgdjasd';
//$a = array("Nome","Cidade");
//extract($_POST ,EXTR_OVERWRITE);
//
//echo $nome;





