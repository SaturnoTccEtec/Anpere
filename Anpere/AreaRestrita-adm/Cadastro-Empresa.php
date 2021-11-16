<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anpere - entre ou cadastre-se</title>
    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <link rel="stylesheet" href="../resources/css/cadastro.css" media="screen">
    <script src="../resources/js/validarCep.js" type='module' defer></script>

</head>

<body>
    <div class="container">
        <div class="grid-um">
            <div class="titulo">
                <h3>Novo Registro - Empresa</h3>
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
        <div class="grid-dois">.</div>
    </div>
</body>

</html>

<script>
    function validarSenha(){
        var senha = document.getElementById("senha").value;
        var confirmarsenha = document.getElementById("confirmar-senha").value;

        if (senha == confirmarsenha){

            return true;

        }

        else {
            return false;
        }
    }

    function validarCnpj() {
        var cnpj = document.getElementById("cnpj").value;

        if (cnpj == '') return false;

        cnpj = cnpj.replace(/[^\d]+/g, '');

        if (cnpj == '') return false;

        if (cnpj.length != 14)
            return false;

        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            return false;

        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;

        return true;
    }

    function validarEmail() {

        //Validação simples
        //Verificação se o email possuí "@"
        //Verificação se o email possuí mais do que 2 caracteres antes do "@"
        //Verificação se o email possuí mais do que 3 caracteres depois do "@"


        var strEmail = document.getElementById("email").value;

        if (strEmail.indexOf("@") == -1) {
            return false;
        }

        var nomeUsuario = strEmail.substring(0, strEmail.indexOf("@"));
        var nomeDominio = strEmail.substring(strEmail.indexOf("@") + 1, strEmail.length);

        if (nomeDominio.length <= 2 || nomeUsuario.length <= 1) {
            return false;
        }
        return true;

    }

    function validarNome() {

        //Validar se o nome não possuí caracteres especiais
        //Validar se o nome não é menor que 2 letras

        var special_characters = `!#$%'()*,./]:;<=>?[^_"{|}~`;
        var nome = document.getElementById("name").value;

        if (nome == null || nome == "") {
            return false;
        }
        if (nome.length <= 2) {
            return false;
        }
        for (var i = 0; i < special_characters.length; i++) {

            if (nome.indexOf(special_characters[i]) != -1) {
                return false;
            }

        }
        return true;
    }

    function validarTelefone() {
        var tel1 = document.getElementById("tel").value;
        tel1 = tel1.replace(/[^\d]+/g, ''); // Substituir os caracteres não númericos

        if (tel1 == "00000000000" ||
            tel1 == "11111111111" ||
            tel1 == "22222222222" ||
            tel1 == "33333333333" ||
            tel1 == "44444444444" ||
            tel1 == "55555555555" ||
            tel1 == "66666666666" ||
            tel1 == "77777777777" ||
            tel1 == "88888888888" ||
            tel1 == "99999999999" ||
            tel1 == "12345678900" ||
            tel1 == "01234567890" ||
            tel1 == "00123456789")

            return false;

        if (tel1 == null || tel1 == "") {
            return false;
        }
        if (tel1.length < 11 || tel1.length > 11) {
            return false;
        }

        return true;
    }

    function validarNumLogradouro() {
        var num = document.getElementById("num").value;
        num = num.replace(/[^\d]+/g, ''); // Substituir os caracteres não númericos

        if (num == null || num == "") {
            return false;
        }
        if (num.length > 4) {
            return false;
        }
        return true;
    }



    // Função geral de validação, quando a ultima validação for feita, deverá ser exibida uma mensagem "Cadastrado feito com sucesso", ou algo do tipo
    function validacao() {

        if(validarSenha()){

        if (validarCnpj()) {

            if (validarEmail()) {

                if (validarNome()) {

                    if (validarTelefone()) {

                            if (validarNumLogradouro()) {

                            } else {
                                alert("Número do Logradouro inválido")
                                return false;
                            }


                    } else {
                        alert("Telefone inválido");
                        return false;
                    }

                } else {
                    alert("Nome inválido.");
                    return false;
                }

            } else {
                alert("Email inválido.");
                return false;
            }


        } else {
            alert("Cnpj inválido.");
            return false;
        }

    }else {
            alert("As senhas não coincidem");
            return false;
        }
    }
</script>