<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anpere - entre ou cadastre-se</title>
    <link href="images/LogoAnpere.png" rel="icon">
    <link rel="stylesheet" href="css/cadastro.css" media="screen">

</head>

<body>
    <div class="container">
        <div class="grid-um">
            <div class="titulo">
                <h3>Novo Registro - Cliente</h3>
            </div>

            <div class="subtitulo">
                <p> 1. DADOS PESSOAIS</p>
            </div>

            <form method="POST" action="cadastrar-cliente.php" class="form">
                <div>
                    <label class="label"> Nome completo: </label>
                    <input id="name" name="txtNome" class="nome" type="text">
                </div>

                <fieldset style="padding:0; border:none;" class="grupo">

                    <div style="float:left;">
                        <label class="label">CPF:</label><br>
                        <input id="cpf" name="txtCpf" type="number">
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <label class="label">Email:</label><br>
                        <input id="email" name="txtEmail" type="email">
                    </div>

                </fieldset>

                <fieldset style="padding:0; border:none;" class="grupo">
                    <div style="float:left;">
                        <label class="label">Telefone:</label><br>
                        <input id="tel1" name="txtTel1" class="telefone" type="number">
                    </div>
                    <div style="float:left; margin-left:6px;">
                        <label class="label">Telefone 2:</label><br>
                        <input id="tel2" name="txtTel2" class="telefone" type="number">
                    </div>

                </fieldset>


                <div class="subtitulo">
                    <p> 2. ENDEREÇO</p>
                </div>

                <fieldset style="padding:0; border:none;" class="grupo">
                    <div style="float:left;">
                    <label class="label">Logradouro:</label><br>
                    <input id="log" name="txtLog" class="logradouro" type="text">
                    </div>
                    <div style="float:left; margin-left:6px;">
                    <label class="label">N°</label><br>
                    <input id="num" name="numero" class="numero" type="number">
                    </div>
                </fieldset>

                <fieldset style="padding:0; border:none;" class="grupo">
                    <div style="float:left;">
                    <label class="label">CEP:</label><br>
                    <input id="cep" name="txtCep" class="cep" type="number"required>
                    </div>
                    <div style="float:left; margin-left:6px;">
                    <label class="label">Bairro:</label><br>
                    <input id="bairro" name="txtBairro" class="bairro" type="text"required>
                    </div>
                    <div style="float:left; margin-left:6px;">
                    <label class="label">Cidade:</label><br>
                    <input id="cidade" name="txtCidade" class="cidade" type="text" required>
                    </div>
                    <div style="float:left;">
                    <label class="label">Estado:</label><br>
                    <input id="estado" name="txtEstado" class="estado" type="text"required>
                    </div>
                    <div style="float:left; margin-left:6px;">
                    <label class="label">Senha:</label><br>
                    <input id="senha" name="txtSenha" class="senha-cliente" type="password" required>
                    </div>
                    <div style="float:left; margin-left:6px;">
                    <br>
                    <button class="btn" type="submit"> Cadastrar </button>
                    </div>
                   
                    
                </fieldset>
            </form>
        </div>
        <div class="grid-dois">.</div>
    </div>
</body>

</html>