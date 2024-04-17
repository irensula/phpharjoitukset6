<?php require "partials/head.php"; ?>

<h2 class="centered">Lue uutiset</h2>



<div class = "news">
    <form action="/" method="POST">
        <label for="type"></label>
        <select id="type" name="type">
            <option value="Kaikki tyypit">Kaikki tyypit</option>
            <option value="Kirjat">Kirjat</option>
            <option value="Pelit">Pelit</option>
            <option value="Elokuva">Elokuva</option>
            <option value="Sarjat">Sarjat</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php

    foreach($allreviews as $review): ?>
        
        <div class='review'>
            <p><?=$review["type"]?></p>
            <h3><?=$review["name"] ?></h3>
            <p><?=$review["grade"]?></p>
            <p><?=$review["estimate"]?></p>
            <p><?=$review["userID"]?> By user: <?=$review["userID"]?></p>
            <p><?=$review["date"]?></p>
            <?php
            if(isLoggedIn() && ($review["userID"] == $_SESSION['userid'])):
                $id = $review['reviewID'];
                $reviewid = 'deleteNews' . $id; ?>
                
                <a id=<?=$reviewid ?> onClick='confirmDelete(<?=$id?>)' href='/delete_review?id=<?=$id?>'>Poista</a> |

                <a href='/delete_review?id=<?=$id?>'>Päivitä</a>
            <?php endif; ?>
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>