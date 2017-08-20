<?php

?>

<h1>Admin</h1>

<form action="" method="post" class="container">
    <?php
    if (isset($msg)){
        echo "<ul>";
        foreach ($msg as $r)
            echo "<li class='alert-warning'>$r</li>";

        echo "</ul>";
    }
    ?>
    <div class="form-group">
        <label for="pseudo">Pseudo:</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo..." class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input name="password" id="password" type="password" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
