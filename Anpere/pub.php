<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicacao</title>
</head>

<body>
    <!-- Formulário de inserção-->
    <section>

        <form method="post" enctype="multipart/form-data" action="AreaRestrita-empresa/inserir-publicacao.php?id=$">
            <input type="number" placeholder="id" name="id" />
            <input type="text" placeholder="titulo" name="txtTitulo" />
            <input type="text" placeholder="descricão" name="txtDescricao" />
            <input type="file" placeholder="arquivo" name="txtFoto" />
            <input type="number" placeholder="preço" name="txtPreco" />
            <input type="text" placeholder="link avaliação" name="txtAvaliacao" />
            <input type="submit" value="Salvar">
        </form>

    </section>

    <!-- Consulta de dados -->
    <section>
        <?php
        require_once("global.php");
        $pdo = CONNECTION::GET_PDO();
        try {
            $stmt = $pdo->prepare("select * from tbPublicacao");

            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                echo $row['idPublicacao'] . "";
                echo $row['descricaoPublicacao'];
        ?>
                <img <?php echo "src='resources/images/upload/publicacao/" . $row['fotoProdutoPublicacao'] . "'"; ?>>
        <?php

            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        ?>
    </section>

</body>

</html>