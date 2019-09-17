<?php



function encrypt($password_aberta)
{
$valor = base64_encode( pack( 'H*' , md5( $password_aberta ) ) );
return $valor;
}


function decrypt($textocrypt,$senha) {
 for ($i=1; $i<=strlen($textocrypt); $i=$i+1) {
  $caractersenha=(ord(substr($senha,$i-1,1)));
  $caractertexto=ord(substr($textocrypt,$i-1,1));
  $caracter = $caractertexto - $caractersenha ;
  $textodecrypt=$textodecrypt.chr($caracter);
 }
 return $textodecrypt;
}


function password_md5( $password_aberta )
{
$valor = '{md5}' . base64_encode( pack( 'H*' , md5( $password_aberta ) ) );
return $valor;
}


function senha_md5( $password_aberta )
{
$valor = base64_encode( pack( 'H*' , md5( $password_aberta ) ) );
return $valor;
}






/*
$texto = "tulio";
$senha = "escolas";
$textocrypt = encrypt($texto,$senha);
$textodecrypt = decrypt($textocrypt,$senha);

echo "Texto: $texto<br>";
echo "Senha: $senha<br>";
echo "Texto Criptografado: $textocrypt<br>";
echo "Texto Descriptografado: $textodecrypt<br>";*/
?>
