<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "<script>
                alert('Credentials already in the database');
                window.location = 'index.php';
              </script>";
    } else {
        // Insert the new data into the database
        $insertSql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $insertSql)) {
            echo "<script>
                    alert('New user created successfully');
                    window.location = 'index.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
