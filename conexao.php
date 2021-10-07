<?php

$serviodor_bd = "localhost";
$usuario_bd = "root";
$senha_bd = ""; 
$banco = "bd-anuncios";

// função de conexão com MySQL
@$mysqli = new mysqli($serviodor_bd,$usuario_bd,$senha_bd,$banco_bd);

if( $mysqli->connect_errno){
    echo "FALHA AO CONECTAR, CONTATE O ADM";

}else{

    mysqli_set_charset($mysqli,"utf8");

}

?>