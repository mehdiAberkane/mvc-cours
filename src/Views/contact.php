<?php

?>

<h1>Contact</h1>

<div>
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
            <label for="subject">Sujet:</label>
            <input type="text" name="subject" id="subject" placeholder="Sujet" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Votre Email" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Message:</label>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="Votre message..." class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
</div>
