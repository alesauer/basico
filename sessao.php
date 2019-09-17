<?php 
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['cont_acesso']) == true) and (!isset ($_SESSION['ultimo_acesso']) == true) and (!isset ($_SESSION['COD_Usuario']) == true))
{
	session_destroy();
    unset($_SESSION['login']);
    unset($_SESSION['cont_acesso']);
    unset($_SESSION['ultimo_acesso']);
    unset($_SESSION['senha']);
    unset($_SESSION['COD_Usuario']);
    header('location:login.php');
    }
//echo $logado;
?>