<?php

//include class
include "Classes/sql.class.php";
include "Classes/Template/Template.php";

//crias as pastas
@mkdir("Entities");
@mkdir("Entities/Generator");

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
        $Campos[] = array($i->Field, $nomeTable);
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
            } else {
                //Pega as relações
                $tabela = $v->TabelaReferencia;
                $i = 1;
                //verifica o nome

                $tabelatmp = $tabela;
                while (in_array($tabela, $verifica)) {
                    $tabela = $tabelatmp . $i;
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
foreach ($Campos as $l) {


    $type = null;


    if (count($l) == 2) {
        //pegaTipo
        $consulta = "
    SHOW FIELDS
FROM ".$l[1]." where Field ='".$l[0]."'";
        foreach ($s->consulta($consulta) as $v):

           $type = $v->Type;

        endforeach;

        if($type != null){
            $vars .= "\n/**
                 * @Name: ".$l[0]."
                 * @Type: ".$type."
                 */";
        }

        if($type == 'timestamp')
            $vars .= "\n var $" . $l[0] . " = CURRENT_TIMESTAMP;\n";
        else if ($type == 'tinyint(1)')
            $vars .= "\n var $" . $l[0] . " = false;\n";
            else
            $vars .= "\n var $" . $l[0] . ";\n";

    }else {
        if ($l[2] == "PRIMARY") {

            $consulta = "
    SHOW FIELDS
FROM ".$l[1]." where Field ='".$l[0]."'";
            foreach ($s->consulta($consulta) as $v):

                $type = $v->Type;

            endforeach;


            $vars .= "/**
                 * @PrimaryKey
                 * @Name: ".$l[0]."
                 * @Type: ".$type."
                 */";
            $vars .= "\n var \$" . $l[0] . ";\n";

        } else {
            if($l[0] != '') {
                $vars .= "\n/**
                 * @Name: _".ucfirst($l[0])."
                 * @Fk: ".$l[1]."
                 * @Type: ".ucfirst($l[2])."
                 */";
                $vars .= "\n var \$_" . ucfirst($l[0]) . ";\n";
            }
        }
    }
}

$template = new Template("ClasseTemplate.tpl");
$template->set('date', $data);
$template->set('C', ucfirst($nomeTable));
$template->set('vars', $vars);
$template->write('Entities/Generator/' . ucfirst($nomeTable) . '.php');

}


