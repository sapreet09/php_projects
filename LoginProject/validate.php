<?php
    include_once('connection.php');

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);
        $stmt = $conn->prepare("SELECT * from users where username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if($user) {
            if(password_verify($password, $user['password'])) {
                echo "Login Successful!";
                header("Location: adminpage.php");
                exit;
            } else {
                echo "<script>alert('Invalid Password'); </script>";
            }
        } else {
            echo "<script>alert('No user found with that username'); </script>";
        }
    }
?>