<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Back</title>
    <link rel="stylesheet" type="text/css" href="/Views/styles/dist/css/main.css">
    <script src="dist/js/main.js"></script>
</head>
<body>
    <header id="header" class="bo-connexion-header">
        <p>Accedez au site</p>
    </header>
        <main class="bo-connexion-content">
            <?php include $this->viewName;?>
        </main>
    </div>
</body>
</html>
