<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon/favicon.ico">

    <title>Criar conta - DS2</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/77f3dd62a7.js" crossorigin="anonymous"></script>

</head>

<body cz-shortcut-listen="true" class="bg-light">

    <main role="main" class="container">

        <div class="row">
            <div class="col-sm-4 offset-sm-4 bg-white mt-5 border rounded bg-white">
                <h1 class="h4 text-center">
                    <a href="index.php">DS2</a>
                </h1>
                <p class="login-box-msg text-center">Crie sua conta gratuita</p>

                <?php   
                    session_start();

                    if(isset($_get[`erro`])){
                        
                        $erro = $_SESSION[`mensagemErro`];
                        $dadosform - $_SESSION[`dadosform`];

                    }

                ?>

                <form action=".php" method="post" id="formCriaConta">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome completo" aria-label="nomeCompleto" aria-describedby="basic-addon1"
                        value="<?php echo @$dadosform[`nome`];?>">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" aria-label="E-mail" aria-describedby="basic-addon1"
                        value="<?php echo @$dadosform[`email`];?>"
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="basic-addon1"
                        value="<?php echo @$dadosform[`senha`];?>"
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="confirmaSenha" id="confirmaSenha" class="form-control" placeholder="Repita a senha" aria-label="Repita a senha" aria-describedby="basic-addon1"
                        value="<?php echo @$dadosform[`confirmaSenha`];?>"
                        <br> </br>
                    </div>

                        <?php
                            if(@$dadosform[`termos`]= `on`){
                                $checked = "checked=`checked`";

                            }
                        
                        ?>

                    <div class="form-group form-check">
                        <input type="checkbox" name="termos" class="form-chsseck-input" id="termos"
                        <?php echo @$checked; ?>>
                        <label class="form-check-label" for="exampleCheck1">
                            Aceitar os <a href="#" data-toggle="modal" data-target="#modalTermos">termos</a>
                        </label>
                    </div>

                    <?php

                        if(isset($_get[`erro`])){

                            echo "<ul class=`alert alert-danger`>";

                                foreach($erro as $mensagem){
                                    echo "<li> $mensagem </li>";

                             }

                            echo "</ul>";

                        }


                    ?>

                    <div class="form-group text-right">
                    <br>  <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </br>    
                </div>
                </form>

                <p class="mb-1">
                    <a href="login.php">Já tenho uma conta</a>
                </p>

            </div>
        </div>

    </main><!-- /.container -->

<!-- Modal -->
<div class="modal fade" id="modalTermos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Termos DS2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <h1 class="h5">Nossos termos</h1>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt id pariatur, quae nesciunt, consequatur voluptatibus quam atque cupiditate aliquid nemo ratione. Nam tenetur repudiandae dolores officiis, nihil dolorem iste veniam.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, vero deleniti quidem quae corporis possimus. Laudantium molestiae ut natus ab totam corporis eos optio quod laboriosam accusantium. Sapiente, atque sit?</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="js/jquery-3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formCriaConta').validate({
                rules: {
                    nome: {
                        required: true
                    },
                    email: {
                      required: true,
                      email: true
                    },
                    senha: {
                      required: true,
                      minlength: 6
                    }, 
                    confirmaSenha: {
                      equalTo: "#senha"
                    },
                    termos: {
                        required: true
                    },
                },
                messages: {
                    nome: {
                        required: "O campo nome é obrigatório"
                    },
                    email: {
                      required: "Informe o seu e-mail",
                      email: "Utilize um e-mail válido"
                    },
                    senha: {
                      required: "A senha é obrigatória",
                      minlength: "A senha deve ter no mínimo 6 caracteres"
                    },
                    confirmaSenha: {
                      equalTo: "Senhas não conferem"
                    },
                    termos: {
                        required: "Você deve aceitar os temos para criar a conta"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

</body>

</html>