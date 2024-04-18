<?php require "../partials/header.php"; ?>
    <div class="container">
        <h1>Registration</h1>

        <form action="/registration" method="post">
            <label for="username">Write your name:</label>
            <input type="text" name="username" id="username">

            <label for="password">Enter your password:</label>
            <input type="password" name="password" id="password">

            <button class="yellow-button">Submit</button>
        </form>
    </div>

<?php require "../partials/footer.php"; ?>