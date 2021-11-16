<?php
class Valida
{

    public static function ValidaSessao($targetUrl, $requestLevel)
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        $validate = null;

        if (isset($_SESSION['login'])) {

            if ($_SESSION['login']) {
                //logado
                if (isset($_SESSION['level'])) {
                    //sessão criada corretamente
                    $validate = true;


                    //Verifica se a respectiva conta está acessando sua respectiva área!
                    $user = $_SESSION['level'];

                    //rotina de redirecionamento
                    if ($requestLevel == "adm" and $validate) {
                        if ($user != $requestLevel) {
                            print("<script>alert('Seu login não possuí autorização para prosseguir para essa página! Faça login como administrador para prosseguir');
                    location.href='$targetUrl';
                </script>");
                        }
                    }

                    if ($requestLevel == "cliente" and $validate) {
                        if ($user == $requestLevel || $user == "adm") {
                        } else {
                            print("<script>alert('Seu login não possuí autorização para prosseguir para essa página! Faça login como cliente para prosseguir.');
                    location.href='$targetUrl';
                </script>");
                        }
                    }

                    if ($requestLevel == "empresa" and $validate) {
                        if ($user == $requestLevel || $user == "adm") {
                        } else {
                            print("<script>alert('Seu login não possuí autorização para prosseguir para essa página! Faça login como empresa ou corporação para prosseguir.');
                    location.href='$targetUrl';
                </script>");
                        }
                    }
                } else {
                    //sessão não criada corretamente!
                    $validate = false;
                }
            } else {
                //login não autorizado!
                $validate = false;
            }
        } else {
            //login não existente!
            $validate = false;
        }

        if ($validate != true) {
            session_destroy();
            header("Location: " . $targetUrl);
            #print("<script>alert('Faça login para prosseguir para essa página!');
            #location.href='$targetUrl';
            #</script>");
        }
    }

    public static function ValidaLogin($targetUrl, $requestLevel)
    {
        session_start();
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login']) {
                //já logado!
                if ($requestLevel == $_SESSION['level']) {
                    //verifica se o respectivo usuário está acessando a página de login ou cadastro novamente
                    header("Location: " . $targetUrl);
                } else {
                    if ($_SESSION['level'] == "adm") {
                        header("Location: ../AreaRestrita-adm/indexAreaRestrita.php");
                    }
                    if ($_SESSION['level'] == "cliente") {
                        header("Location: ../AreaRestrita-Cliente/indexAreaRestrita.php");
                    }
                    if ($_SESSION['level'] == "empresa") {
                        header("Location: ../AreaRestrita-Empresa/indexAreaRestrita.php");
                    }
                }
            } else {
                session_destroy();
            }
        } else {
            session_destroy();
        }
    }
}
