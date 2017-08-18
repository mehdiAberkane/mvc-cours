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
        <label for="title">Titre:</label>
        <input type="text" name="title" id="title" placeholder="Titre..." class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Message:</label>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Votre contenu..." class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
