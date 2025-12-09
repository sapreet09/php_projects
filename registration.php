<html>
<body>
    <p>Registration Page</p>
    <form action="registration.php" method="post">
        Full Name: <input type="text" name="fullname"><br>
        Username: <input type="text" name="username"><br>
        Email: <input type="text" name="email"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit" value="register">
    </form>
</body>
</html>


<?php 
    require 'dbconn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = trim($_POST['fullname']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(!empty($fullname) && !empty($username) && !empty($email) && !empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fullname, $username, $email, $hashedPassword);

            if($stmt->execute()) {
                header("Location: registration.php?success=1");
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "All fields are required.";
        }
    }
?>