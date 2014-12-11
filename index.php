<?php

//include class
include "sql.class.php";
include "Template.php";

//crias as pastas
@mkdir("Class");
@mkdir("Class/DAL");

$s = new sql();

//Preencher para evitar conflitos com tabelas de mesmo nome
$nomeBranco = '';


//Consulta as tabelas
foreach ($s->consultaNUMBER("SHOW TABLES") as $l) {

    //Variavel para guardar a primary key da tabela
    $primary = "";

    //Nome da Tabela
    $nomeTable = $l[0];

    //Apaga a variavel $Campos se ela existir
    if (isset($Campos)) {
        unset($Campos);
    }

    //Busca as colunas
    foreach ($s->consulta("SHOW COLUMNS FROM " . $nomeTable) as $i) {
        $Campos[] = array($i->Field);
        $verifica[] = $i->Field;
    }

    //Consulta relações e primary key
    $consulta = "";
    $consulta .= "SELECT column_name            AS NomeColuna, ";
    $consulta .= "       constraint_name        AS Tipo, ";
    $consulta .= "       referenced_column_name AS CampoReferencia, ";
    $consulta .= "       referenced_table_name  AS TabelaReferencia ";
    $consulta .= "FROM   information_schema.key_column_usage ";
    $consulta .= "WHERE  table_name = '$nomeTable' ";

    //caso haja conflitos
    if ($nomeBranco != "")
        $consulta .= "AND TABLE_SCHEMA = '$nomeBranco'";

    if ($s->conta($consulta) > 0) {
        foreach ($s->consulta($consulta) as $v):
            //Marca a Primary Key
            if ($v->Tipo == "PRIMARY") {
                $k = array_search($v->NomeColuna, $Campos);
                $Campos[$k][] = "PRIMARY";
                $primary = $v->NomeColuna;
            } else {
                //Pega as relações
                $tabela = $v->TabelaReferencia;
                $i = 1;
                //verifica o nome
                while (in_array($tabela, $verifica)) {
                    $tabela .= $i;
                    $i++;
                }
                $verifica[] = $tabela;
                $Campos[] = array($tabela, $v->NomeColuna, $v->TabelaReferencia);
            }
        endforeach;
    }

    echo '<br><br><br>';

    $data = date("d/m/Y H:i:s");

    $vars = "";
    $set = "//Preenche o Obj";
    foreach ($Campos as $l) {
        if (count($l) == 1) {
            $vars .= "\n var $" . $l[0] . ";";
            $set .= "\n\t\t \$obj->" . $l[0] . " = \$l->" . $l[0] . ";";
        } else {
            if ($l[1] == "PRIMARY") {
                $vars .= "/**
                 * @PrimaryKey: true
                 */";
                $vars .= "\n var \$" . $l[0] . ";";
                $set .= "\n\t\t \$obj->" . $l[0] . " = \$l->" . $l[0] . ";";
            } else {
                $vars .= "\n var $" . $l[0] . "; //FK";
                $vars .= "\n var \$PK" . $l[0] . " = \"" . $l[1] . "\";"; //FK";

                $set .= "\n";
                $set .= "\n\t\t //Busca objeto $l[2]";
                $set .= "\n\t\t \$objectFK = new " . $l[2] . "DB();";
                $set .= "\n\t\t \$FK = \$obj->PK" . $l[0] . ";";
                $set .= "\n\t\t \$obj->" . $l[0] . " = \$objectFK->getById(\$l->\$FK);";
                
            }
        }
    }

    $template = new Template("classVariaveis.tpl");
    $template->set('date', $data);
    $template->set('C', ucfirst($nomeTable));
    $template->set('vars', $vars);
    $template->write('Class/DAL/' . ucfirst($nomeTable) . '.php');



    $class = new Template("classSql.tpl");
    $class->set('Data', $data);
    $class->set('Table', $nomeTable);
    $class->set('Primary', $primary);
    $class->set('contrucao', $set);
    $class->write('Class/DB/' . $nomeTable . 'DB.class.php');
}


