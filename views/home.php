<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <a href="/login">Login</a>
    <p>If you don't have an account, you can register <a href="/registration">here</a></p>

    <?php 
        require_once ".././database/models/user.php";

        $users =  showAllUsers();

        foreach($users as $user) {
            echo $user["username"], $user["pwd"]; 
        } ?>
</body>
</html>