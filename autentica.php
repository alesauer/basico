<?php
 include ("funcoes.php");
 include ("conexao_banco.php");
 include ("verip.php");
 include ("crypt.php");
 include ("../config.php");

$usuario_login = $_POST["email"];
$senha_login = $_POST["pass"];


//echo "Senha aberta : $senha_login - User: $usuario_login<br>";



$usuario_login = addslashes($_POST["email"]);
$senha_login = md5($_POST["pass"]);

 $IP=qualip();
 $usuario_login=trim($usuario_login);
 
 date_default_timezone_set('America/Sao_Paulo');
 $data=date("d/m/Y");
 //$data="06/06/2013";
 

 $sql="select * from usuario where login='$usuario_login'";
 $resultado=conecta($maquina,$usuario,$senha,$banco,$sql);
 
if(mysql_num_rows($resultado) > 0)
{
	while($linha=mysql_fetch_array($resultado))
	    {
		$COD_Usuario=trim($linha["COD_Usuario"]);
	    $nome=trim($linha["nome"]);
		$login=trim($linha["login"]);
	    $pass=trim($linha["senha"]);
	    $email=trim($linha["email"]);
	    $perfil=trim($linha["perfil"]);
	    $cont_acesso=trim($linha["cont_acesso"]);
	    $ultimo_acesso=trim($linha["ultimo_acesso"]);

//echo "Senha bco: $senha<br>Senha for: $senha_login<br>Nome bco: $login<br>Nome for: $usuario_login";  exit;
	  
	      if($login=="$usuario_login" and $pass=="$senha_login")
	        {
	         session_start();
	         session_name($name_session);	
			 $_SESSION["COD_Usuario"] =  $COD_Usuario;
			 $_SESSION["login"] =  $login;
	         $_SESSION["senha"] = $pass;
	         $_SESSION["perfil"] = $perfil;
	         $_SESSION["cont_acesso"] = $cont_acesso;
	         $_SESSION["ultimo_acesso"] = $ultimo_acesso;

	        //Contador de Acesso do usuário
	        $data=date("d/m/Y - H:i:s");
	        $cont_acesso++;
	      	$sql1="update usuario SET cont_acesso='$cont_acesso', ultimo_acesso='$data' WHERE COD_Usuario='$COD_Usuario'";
	      	$resultado1=conecta($maquina,$usuario,$senha,$banco,$sql1);

	         header("Location:../principal.php?login=$login");
			 logs ( $login , "AUTENTICACAO" , "SUCESSO" ,$IP );
	         exit;
			 }
			 else { 
				 	unset ($_SESSION['login']);
	    			unset ($_SESSION['senha']);
	    			unset ($_SESSION['perfil']);
	    			unset ($_SESSION['cont_acesso']);
	    			session_destroy();
				 	logs ( $usuario_login , "AUTENTICACAO" , "ERRO" ,$IP ); 
					header("Location:../login.php?resultadoLogin=0");
					exit;
			}
	}

}//end if num_rows
 else { 
			 	logs ( $usuario_login , "AUTENTICACAO" , "ERRO" ,$IP ); 
				header("Location:../login.php?resultadoLogin=0");
				exit;
			}
 exit; 
?>