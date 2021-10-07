<?php 

$condigoAtivacao = $_GET['condigoAtivacao'];
INCLUDE("connection/conexao.php");


$sql = "SELECT cod_ativacao FROM  tbl_login where cod_ativacao=MD5('$codigoAtivacao')";


$executaSql = $mysqli->query($sql);


$totalLinhas = $executaSql->num_rows;

if($totalLinhas == 1){

    $ativaConta = "UPDATE tbl_login SET cod_ativacao='',
    status_login=1
    WHERE cod_ativacao=MD5('$codigoAtivacao')";

    $executaAtivacao = $mysqli->query($ativaConta);
    echo "<p> Conta ativada com sucesso!  </p>
            <p> <meta http-equiv='refresh' content='1;url=login.php'> Redirecionando... </p>"; 

            


}else{

    echo "Codigo de ativacao invalido";
    

}



?>