<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <script>
        function isvalid() {
            var user = document.forms["yourForm"]["user"].value;
            var pass = document.forms["yourForm"]["pass"].value;
            var cpass = document.forms["yourForm"]["cpass"].value;

            if (user.length === 0 && pass.length === 0) {
                alert("Username and password are empty");
                return false;
            } else if (user.length === 0) {
                alert("Username is empty");
                return false;
            } else if (pass.length === 0) {
                alert("Password is empty");
                return false;
            } else if (cpass.length === 0) {
                alert("Confirm Password is empty");
                return false;
            } else if (pass !== cpass) {
                alert("Password does not match");
                return false;
            }

            return true; 
        }

        function handleRegister(){

            window.location.href='register.php';

        }
    </script>
</head>
<body>
<div id="form">
        <h1>Registration Form</h1>
        <form method="POST" name='yourForm' onsubmit="return isvalid()" action="createUser.php">
            <label >Username:</label>
            <input type="text" id="user" name="user">
            <br>
            <br>
            <label >Password</label>
            <input type="password" id="pass" name="pass">
            <br>
            <br>
            <label >Confirm Password</label>
            <input type="password" id="cpass" name="cpass">
            <br>
            <br>
            <input type="submit" value="Submit" id='btn' name="submit">

        </form>
    </div>
</body>
</html>