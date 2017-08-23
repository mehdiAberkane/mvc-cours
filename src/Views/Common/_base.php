<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Accueil</title>
</head>
<body class="container">
    <nav class="nav navbar-default">
        <ul class="nav nav-pills">
            <li><a href="/">Accueil</a></li>
            <li><a href="/contact">Contact</a></li>

        </ul>
        <div>
            <form action="" method="post" class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for..." aria-label="Search for...">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-secondary">Go!</input>
                      </span>
                </div>
            </form>
        </div>

    </nav>
    <?php include $path; ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
