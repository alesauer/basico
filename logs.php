<?php
include("conexao_banco.php");
include("funcoes.php");


function logs ( $COD_USUARIOS_SISTEMA , $TIPO_LOGS , $ACAO ,$IP )
{


date_default_timezone_set('America/Sao_Paulo');
$hora=date("Y-m-d H:i:s");
$data=date("Y-m-d");

$sql = "insert into logs_2(COD_USUARIOS_SISTEMA,DATA_LOGS,HORA_LOGS,TIPO_LOGS,ACAO,IP_LOGS) 
VALUES ('$COD_USUARIOS_SISTEMA','$data','$hora','$TIPO_LOGS','$ACAO','$IP')";
$resultado = conecta($maquina,$usuario,$senha,$banco,$sql);

}



?>
