<?php

?>

<h1>Admin</h1>

<form action="" method="post" class="container">
    <?php
    if (isset($param)){
        echo "<ul>";
        foreach ($param as $r)
            echo "<li class='alert-warning'>$r</li>";

        echo "</ul>";
    }
    ?>
    <div class="form-group">
        <label for="pseudo">Pseudo:</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo..." class="form-control">
    </div>
    <div class="form-group">
        <label for="password_1">Mot de passe:</label>
        <input name="password_1" id="password_1" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="password_2">Mot de passe:</label>
        <input name="password_2" id="password_2" type="password" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
