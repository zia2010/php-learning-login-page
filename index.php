




<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <script>
        function isvalid() {
            var user = document.forms["yourForm"]["user"].value;
            var pass = document.forms["yourForm"]["pass"].value;

            if (user.length === 0 && pass.length === 0) {
                alert("Username and password are empty");
                return false;
            } else if (user.length === 0) {
                alert("Username is empty");
                return false;
            } else if (pass.length === 0) {
                alert("Password is empty");
                return false;
            }

            return true; // If all checks pass, the form can be submitted.
        }

        function handleRegister(){

            window.location.href='register.php';

        }
    </script>
</head>
<body>

    <div id="form">
        <h1>Login Form</h1>
        <form method="POST" action="login.php" onsubmit="return isvalid()" name='yourForm'>
            <label >Username:</label>
            <input type="text" id="user" name="user">
            <br>
            <br>
            <label >Password</label>
            <input type="password" id="pass" name="pass">
            <br>
            <br>
            <input type="submit" value="Login" id='btn' name="submit">
            <button id="btn" type="button" onclick="handleRegister();">Register</button>

        </form>
    </div>
</body>
</html>
