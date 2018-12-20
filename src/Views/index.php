<?php


?>

<h1>Accueil</h1>
<p class="col-lg-1">
    <?php
        if (isset($posts)) {
            foreach ($posts as $post) {
                echo
                "<article class='row' style='border: 1px solid black;'>
                    <h2><a href='/article/".$post->getSlug()."'>".$post->getTitle()."</a></h2>
                    <p>".$post->getContent()."</p>
		    <time datetime='".$post->getDateCreated()."'>".$post->getDateCreated()."</time>
		    <div style='font-size: 10px; text-align: right;'>Author: Chevre</div>
                </article>";
            }
        }

    ?>
</p>
