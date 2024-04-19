<?php require ".././partials/header.php"; ?>

<div class="reviews-container">
    <h2 class="centered">Kaikki arvostelut</h2>
    <select id="type" name="type">
                <option value="Kaikki tyypit">Kaikki tyypit</option>
                <option value="Kirjat">Kirjat</option>
                <option value="Pelit">Pelit</option>
                <option value="Elokuva">Elokuva</option>
                <option value="Sarjat">Sarjat</option>
            </select>
            <button type="submit">Submit</button>
    <div class = "review-container">
        <form action="/" method="POST">
            <label for="type"></label>
            
        </form>

        <?php
        foreach($allReviews as $review): ?>
            
            <div class='review'>
                <p><?=$review["type"]?></p>
                <h3><?=$review["name"] ?></h3>
                <p><?=$review["grade"]?></p>
                <p><?=$review["text"]?></p>
                <p><?=$review["userID"]?> By user: <?=$review["userID"]?></p>
                <p><?=$review["date"]?></p>
                <?php
                if(isLoggedIn() && ($review["userID"] == $_SESSION['userid'])):
                    $id = $review['reviewID'];
                    $reviewid = 'deleteNews' . $id; ?>
                    
                    <a id=<?=$reviewid ?> onClick='confirmDelete(<?=$id?>)' href='/delete_review?id=<?=$id?>'>Poista</a> |

                    <a href='/update_review?id=<?=$id?>'>Päivitä</a>
                <?php endif; ?>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php 
require ".././partials/footer.php"; ?>