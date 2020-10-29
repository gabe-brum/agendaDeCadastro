<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- CSS do Bootstrap e CSS customizado -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    // Inicia a Session
    session_start();

    // Inclui o menu
    include_once("include/menu.php");
    ?>

    <div class="container">
        <h1 class="titulo">Home</h1>

        <div class="row">
            <div class="col-lg-4">
                <h3>coluna 1</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, tenetur ut. Sint nisi hic quasi neque eligendi esse! Cumque ratione impedit suscipit id. Deleniti amet quis nostrum. Autem, sequi error!</p>
            </div>
            <div class="col-lg-4">
                <h3>coluna 2</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, tenetur ut. Sint nisi hic quasi neque eligendi esse! Cumque ratione impedit suscipit id. Deleniti amet quis nostrum. Autem, sequi error!</p>
            </div>
            <div class="col-lg-4">
                <h3>coluna 3</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, tenetur ut. Sint nisi hic quasi neque eligendi esse! Cumque ratione impedit suscipit id. Deleniti amet quis nostrum. Autem, sequi error!</p>
            </div>
        </div>
    </div>

    <!-- JQuery Online -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Arquivos do CDN Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- JS do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JS customizado -->
    <script src="js/scripts.js"></script>
</body>

</html>