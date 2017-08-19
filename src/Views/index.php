<?php


?>

<h1>Accueil</h1>
<p class="col-lg-1">
    <?php
        if (isset($posts)) {
            foreach ($posts as $post) {
                echo
                "<article class='row'>
                    <h2><a href='".$post->getSlug()."'>".$post->getTitle()."</a></h2>
                    <p>".$post->getContent()."</p>
                    <time datetime='".$post->getDateCreated()."'>".$post->getDateCreated()."</time>
                </article>";
            }
        }

    ?>
</p>
