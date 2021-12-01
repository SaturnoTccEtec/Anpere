<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anpere - entre ou cadastre-se</title>
    <link href="resources/images/LogoAnpere.png" rel="icon">
    <link rel="stylesheet" href="resources/css/cadastro.css" media="screen">
    <script src="resources/js/validarCep.js" type='module' defer></script>

    <?php
    //Bloco responsável por verificar se já existe um login!
    include_once("./Session/valida-sessao.php");
    Valida::ValidaLogin("./AreaRestrita-Empresa/indexAreaRestrita.php", "empresa");
    ?>
</head>

<body>
    <div class="container">
        <div class="grid-um">
        <div class="titulo">
                <div class="img">
                    <img src="resources/images/LogoAnpere.png" alt="">
                </div>
                <h3>Cadastro Empresa - Anpere </h3>
            </div>

            <div class="subtitulo">
                <p> 1. DADOS DA EMPRESA</p>
            </div>

            <form method="POST" action="cadastrar-empresa.php" class="form" onsubmit="return validacao()">
                <div>
                    <label class="label"> Nome da empresa: </label>
                    <input id="name" name="txtNome" class="nome" type="text" required>
                </div>

                <fieldset style="padding:0; border:none;" class="grupo">

                    <div style="float:left;">
                        <label class="label">CNPJ:</label><br>
                        <input id="cnpj" name="txtCnpj" type="number" required>
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <label class="label">Email:</label><br>
                        <input id="email" name="txtEmail" type="email" required>
                    </div>

                </fieldset>

                <fieldset style="padding:0; border:none;" class="grupo">
                    <div style="float:left;">
                        <label class="label">Telefone:</label><br>
                        <input id="tel" name="txtTel" class="telefone" type="number" required>
                    </div>
                </fieldset>


                <div class="subtitulo">
                    <p> 2. ENDEREÇO</p>
                </div>

                <fieldset style="padding:0; border:none;" class="grupo">
                    <div style="float:left;">
                        <label class="label">CEP:</label><br>
                        <input id="cep" name="txtCep" class="cep" type="number" required>
                    </div>
                    <div style="float:left;">
                        <label class="label log">Logradouro:</label><br>
                        <input id="log" name="txtLog" class="logradouro" type="text" readonly="readonly">
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <label class="label">N°</label><br>
                        <input id="num" name="numero" class="numero" type="number" required>
                    </div>
                </fieldset>

                <fieldset style="padding:0; border:none;" class="grupo">

                    <div style="float:left; margin-left:6px;">
                        <label class="label bairro">Bairro:</label><br>
                        <input id="bairro" name="txtBairro" class="bairro" type="text" readonly="readonly">
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <label class="label">Cidade:</label><br>
                        <input id="cidade" name="txtCidade" class="cidade" type="text" readonly="readonly">
                    </div>
                    <div style="float:left;">
                        <label class="label estado">Estado:</label><br>
                        <input id="estado" name="txtEstado" class="estado" type="text" readonly="readonly">
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <label class="label senha">Senha:</label><br>
                        <input id="senha" name="txtSenha" class="senha" type="password" required>
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <label class="label confirmar-senha">Confirmar senha:</label><br>
                        <input id="confirmar-senha" name="txtSenha" class="confirmar-senha" type="password" required>
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <br>
                        <button class="btn" type="submit"> Cadastrar </button>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>

<script src="./resources/js/validarEmpresa.js">
    
</script>