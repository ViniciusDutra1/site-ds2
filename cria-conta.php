<?php 
session_start();

$nome = $_POST[`nome`];
$email = $_POST[`email`];
$senha = $_POST[`senha`];
$ConfirmarSenha = $_POST[`ConfirmarSenha`];
$termos = $_POST[`termos`];

$_SESSION[`dadosForm`] = $_POST();
$_SESSION[`mensagemErro`] = array();

include("connection/conexao.php");


// verificar se o usuario ja existe
$consultaUsuario = "SELECT * FROM tbl_login WHERE email='$email' ";
$executaConsultaUsuario = $mysqli->query($consultaUsuario);
$totalConsultaUsuario = $executaConsultaUsuario->num_rows;

if($totalConsultaUsuario > 0){
    $_SESSION[`mensagemErro`][] = "Este email já esta em uso. Tente outro.";

}



if(strlen($nome)<1){
    $_SESSION[`mensagemErro`][] = "O campo nome é obrigatório";
}

if(strlen($email)<1){
    $_SESSION[`mensagemErro`][] = "O campo email é obrigatório";
}
if(strlen($senha)<6){
    $_SESSION[`mensagemErro`][] = "O campo senha é obrigatório e deve ter no minino 6 caracteres";
}
if($senha<>$ConfirmarSenha){
    $_SESSION[`mensagemErro`][] = "senhas não conferem";
}

if(isset($termos)){
    $_SESSION[`mensagemErro`][] = "voce deve aceitar os termos";

}



if(sizeof($_SESSION[`mensagemErro`])>0){
    echo "location:registro.php?erro=1";

}else{
    
    //destruir a session com as msgs de erros e os dados do forms
    unset($_SESSION['mensagemeErro']);
    unset($_SESSION['dadosForma']);

    //GRAVAR OS DADOS DO USUARIO

    $sqlGravaUsuario = "INSERT INTO tbl_login (nome,email,senha,tipo_usuario,status_login)
                                    VALUES ('$nome', '$email',MD5('$senha'),'user',0)";



    $executaConsultaUsuario = $mysqli->query($sqlGravaUsuario);

    //obter o ultimo codigo gerado na tabela

    $codigoLogin = $mysqli->insert_id;

    //gerar o codigo de atv 

    $codigoAtivacao = time().$codigoLogin;


    //atualizar o usuario com o codigo de atv

    $atualizaCodAtivacao = "UPDATE tbl_login SET cod_ativacao=MD5('$codigoAtivacao')
                                Where cod_login=$codigoLogin ";

    $execultaAtualizacaoCodAtivacao = $mysqli->query($atualizaCodAtivacao);

    echo "<p> Conta criada com sucesso </p>
          <p> Agora você deve <a href='ativa-conta.php?codigoAtivacao=$codigoAtivacao'> Ativar <a> a sua conta  para começar  o sistema. </p>      ";

}






          ?>