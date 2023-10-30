<?php
session_start(); // Start the PHP session

include("connection.php");

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Set a session variable to mark the user as logged in
        $_SESSION['user'] = $username;

        // Set a session timeout for (9 seconds)
        $_SESSION['timeout'] = time() + 1;

        header("Location: welcome.php");
    } else {
        echo "<script>
                alert('Invalid credentials');
                window.location = 'index.php';
              </script>";
    }
}

// Check for session timeout
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to the login page
}
?>
