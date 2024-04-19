<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././styles/reset.css">
    <link rel="stylesheet" href=".././styles/main.css">
    <title>Reviews Website</title>
</head>

<body>

<script>
    function confirmDelete(id) {
        const answer = confirm("Poistetaanko arvostelu?");
        if(!answer){
            document.getElementById('deleteNews' + id).href = '/';
        }
        return answer;
    }
</script>
    <header>
        <h1 class="main-title">Arvostelut</h1>
    </header>
    <nav class="header-navbar">
        <ul>
            <li><a class="navbutton" href="/home">Etusivu</a></li>
            <?php if(!isLoggedIn()): ?>
                <li><a class="navbutton" href="/login">Kirjaudu</a></li>
                <li><a class="navbutton" href="/registration">Rekisteröidy</a></li>
            <?php else: ?>
                <li><a class="navbutton" href="/add_review">Uusi arvostelu</a></li>
                <li><a class="navbutton" href="/logout">Kirjautua ulos</a></li>
            <?php endif ?>
        </ul>
    </nav>