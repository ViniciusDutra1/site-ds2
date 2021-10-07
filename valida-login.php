<?php session_start();

//receber nos campos do formulario

$email = $_POST [`email`];
$senha = $_POST [`senha`];

$_SESSION['dadosFormLogin'] = $_POST; // armazena   todos os dados vindo do post
$_SESSION['mensagemErroLogin'] = array(); //array para armazenas os dados

if( strlen($email)< 1){
    $_SESSION['mensagemErroLogin'][] = "O campo email é obrigatorio";
}

if( strlen($senha)< 1){
    $_SESSION['mensagemErroLogin'][] = "O campo senha é obrigatorio";
}

if( sizeof($_SESSION['mensagemErroLogin']) > 0 ){

    header("location:login.php?erro=1");

}





?>