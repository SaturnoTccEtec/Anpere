<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anpere - entre ou cadastre-se</title>
    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <link rel="stylesheet" href="../css/cadastro.css" media="screen">
    <script src="../resources/js/validarCep.js" type='module' defer></script>
    

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

            <form method="POST" action="cadastrar-cliente.php" class="form" onsubmit="return validacao()">
                <div>
                    <label class="label"> Nome completo: </label>
                    <input id="name" name="txtNome" class="nome" type="text" required>
                </div>

                <fieldset style="padding:0; border:none;" class="grupo" required>

                    <div style="float:left;">
                        <label class="label">CPF:</label><br>
                        <input id="cpf" name="txtCpf" type="number" required>

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
                    <input id="cep" name="txtCep" class="cep" type="number"required>
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
                    <label class="label confirmar-senha">Confirmar a senha:</label><br>
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
    function validarCpf() {
        var strCPF = document.getElementById("cpf").value;
        strCPF = strCPF.replace(/[^\d]+/g, ''); // Substituir os caracteres não númericos

        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000000" ||
            strCPF == "11111111111111" ||
            strCPF == "22222222222222" ||
            strCPF == "33333333333333" ||
            strCPF == "44444444444444" ||
            strCPF == "55555555555555" ||
            strCPF == "66666666666666" ||
            strCPF == "77777777777777" ||
            strCPF == "88888888888888" ||
            strCPF == "99999999999999")
            return false;

            if (strCPF.length != 11)
            return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
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

        var special_characters = `!#$%&'()*+,-./]:;<=>?@[^_"{|}~`;
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
        var tel = document.getElementById("tel").value;
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

        if (validarCpf()) {

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
            alert("CPF inválido.");
            return false;
        }

        }else {
            alert("As senhas não coincidem");
            return false;
        }
    }
</script>