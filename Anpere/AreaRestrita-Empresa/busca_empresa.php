<?php

require_once('../global_two.php');
include_once("../resources/estrutura/nav.php");

$listar = new Categoria();
$lista = $listar->listarCategoria();

// PESQUISA 

$pdo = Connection::GET_PDO();

if (isset($_GET['category'])) {

    $nome = trim($_GET['category']);
    $pdo = $pdo->prepare("SELECT * FROM tbEmpresa WHERE idCategoria LIKE :nome");
    $pdo->bindParam(':nome', $nome, PDO::PARAM_STR);
    $pdo->execute();

    $result = $pdo->fetchAll(PDO::FETCH_ASSOC);
} else if (isset($_GET['keyword'])) {

    $nome = "%" . trim($_GET['keyword']) . "%";
    $pdo = $pdo->prepare("SELECT * FROM tbEmpresa WHERE nomeEmpresa LIKE :nome");
    $pdo->bindParam(':nome', $nome, PDO::PARAM_STR);
    $pdo->execute();

    $result = $pdo->fetchAll(PDO::FETCH_ASSOC);
} else if (isset($_GET['endereco'])) {

    $nome = "%" . trim($_GET['endereco']) . "%";
    $pdo = $pdo->prepare("SELECT * FROM tbEmpresa WHERE bairroEmpresa LIKE :nome");
    $pdo->bindParam(':nome', $nome, PDO::PARAM_STR);
    $pdo->execute();

    $result = $pdo->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../resources/css/index.css" media="screen">

    <link href="../resources/images/LogoAnpere.png" rel="icon">
    <title>Busca</title>
</head>

<body>

    <div class="container-two">
        <form method="GET">
            <div class="main">
                <div class="dropdown">

                    <select name="category" id="category">
                        <option selected disabled>Selecionar categoria</option>
                        <?php //Percorrendo o array
                        foreach ($lista as $linha) { ?>
                            <option value="<?php echo $linha['idCategoria'] ?>">
                                <?php echo $linha['nomeCategoria'] ?></option>
                        <?php }; ?>
                    </select>

                </div>

                <div class="search-box">
                    <div class="searchbar">
                        <i class="fas fa-search"></i>
                        <input name="keyword" id="keyword" type="text" placeholder="Use palavras-chave...">
                    </div>

                    <div class="location">
                        <div class="searchbar">
                            <i class="fas fa-map-marker-alt" _mstvisible="2"></i>
                            <input name="endereco" id="endereco" type="text" placeholder="Bairro...">
                        </div>

                    </div>

                    <div class="button">
                        <button type="submit">Find</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div class="container-tree">
        <div class="titulo">
            <h3>Resultados da pesquisa</h3>
        </div>


        <div class="main-two">
            <?php
            if (count($result)) {
                foreach ($result as $Result) {
                    $perfilempresa = new PerfilEmpresa();
                    $imagemPerfil = $perfilempresa->listarImagensIndex($Result['idEmpresa']);
            ?>
                    <div class="card">
                        <div class="image">
                            <img  <?php echo "src='../resources/images/upload/perfilEmpresa/".$imagemPerfil['fotoperfilempresa']."'"; ?>  alt="Habbib's estabelecimento">
                        </div>
                        <div class="texts">
                            <h3><?php echo $Result['nomeEmpresa']; ?></h3>
                            <p><?php echo ("Rua " . $Result['logradouroEmpresa'] . " - " . $Result['bairroEmpresa'] . ", " . $Result['estadoEmpresa']); ?></p>
                        </div>
                        <div class="button">
                        <a href="perfilEmpresa_empresa.php?id=<?php echo $Result['idEmpresa']; ?>"><button>Mais</button></a>
                        </div>
                    </div>
                <?php
                }
            }
                ?>
        </div>

</body>

</html>