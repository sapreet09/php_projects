<html>
<body>
    <p>Login Page</p>
    <form action="login.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit" value="login">
    </form>
</body>
</html>

<?php
    require "dbconn.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = "select username, password from users where username = '$username'";

        if($result = $conn->query($data)) {
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if(password_verify($password, $row['password'])) {
                    echo "Login successful!";
                } else {
                    echo "Invalid Password";
                }
            } else {
                echo "No user found with that username.";
            }
        }
    }
?>