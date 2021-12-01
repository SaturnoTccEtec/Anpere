function validarSenha() {
    var senha = document.getElementById("senha").value;
    var confirmarsenha = document.getElementById("confirmar-senha").value;

    if (senha == confirmarsenha) {

        return true;

    } else {
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
    tel = tel.replace(/[^\d]+/g, ''); // Substituir os caracteres não númericos

    if (tel == "00000000000" ||
        tel == "11111111111" ||
        tel == "22222222222" ||
        tel == "33333333333" ||
        tel == "44444444444" ||
        tel == "55555555555" ||
        tel == "66666666666" ||
        tel == "77777777777" ||
        tel == "88888888888" ||
        tel == "99999999999" ||
        tel == "12345678900" ||
        tel == "01234567890" ||
        tel == "00123456789")

        return false;

    if (tel == null || tel == "") {
        return false;
    }
    if (tel.length < 11 || tel.length > 11) {
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

    if (validarSenha()) {

        if (validarCpf()) {

            if (validarEmail()) {

                if (validarNome()) {

                    if (validarTelefone()) {

                        if (validarNumLogradouro()) {

                        } else {
                            alert("Número do Logradouro inválido")
                            document.querySelector('input[id="num"]').style.border = "2px solid #900";
                            return false;
                        }

                    } else {
                        alert("Telefone inválido");
                        document.querySelector('input[id="tel"]').style.border = "2px solid #900";
                        return false;
                    }

                } else {
                    alert("Nome inválido.");
                    document.querySelector('input[id="nome"]').style.border = "2px solid #900";
                    return false;
                }


            } else {
                alert("Email inválido.");
                document.querySelector('input[id="email"]').style.border = "2px solid #900";
                return false;
            }


        } else {
            alert("CPF inválido.");
            document.querySelector('input[id="cpf"]').style.border = "2px solid #900";
            return false;
        }

    } else {
        alert("As senhas não coincidem");
        document.querySelector('input[id="senha"]').style.border = "2px solid #900";
        document.querySelector('input[id="confirmar-senha"]').style.border = "2px solid #900";
        return false;
    }
}