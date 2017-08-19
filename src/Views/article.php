<?php

?>

<h1><?php $post->getTitle(); ?></h1>

<p class="col-lg-1">
    <?php
        if (isset($post)) {
            echo
            "<article class='row'>
                <h2>".$post->getTitle()."</h2>
                <p>".$post->getContent()."</p>
                <time datetime='".$post->getDateCreated()."'>".$post->getDateCreated()."</time>
            </article>";
        }
    ?>
</p>
