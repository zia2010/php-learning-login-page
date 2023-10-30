<?php
session_start(); // Start the PHP session

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

        // Set a session timeout for 10 seconds
        $_SESSION['timeout'] = time() + 100;

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
    $username = null; // Set the username to null when the session expires
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Timeout Countdown</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #navbar {
            background-color: #333;
            color: #fff;
            text-align: right;
            padding: 10px;
        }

        #navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        #countdown {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
<div id="navbar">
        <a href="index.php">logout</a>
        <!-- <a href="logout.php">Logout</a> -->
    </div>
    <div id="countdown" style="text-align: center; padding: 20px;">
    <p style="font-size: 24px;">Session will expire in <span id="timer" style="font-weight: bold;">100</span> seconds.</p>
    <p style="font-size: 18px; margin-top: 10px;">
        <?php
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
            echo "Logged in as: <span style='color: #007bff; font-weight: bold;'>" . $username . "</span>";
        } else {
            echo "Logged in as: <span style='color: #ff0000; font-weight: bold;'>no user</span>";
        }
        ?>
    </p>
</div>
    
    <script>
        // Set the initial time and update interval
        let timeLeft = 100;
        const timerElement = document.getElementById('timer');

        // Function to update the countdown timer
        function updateTimer() {
            if (timeLeft > 0) {
                timeLeft--;
                timerElement.textContent = timeLeft;
            } else {
                // Redirect or take action when the countdown reaches 0
                window.location.href = 'index.php'; // Redirect to your desired page
            }
        }

        // Update the timer every second (1000 milliseconds)
        const timerInterval = setInterval(updateTimer, 1000);
    </script>
</body>
</html>
