<?php
session_start();

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if(!empty($username) && !empty($password)) {
        $query = $conn->prepare("SELECT id, username, password, student_id, full_name FROM User WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $result = $query->get_result();
        $user = $result->fetch_assoc();

        if($user && strcmp($password,$user["password"]) == 0) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["student_id"] = $user["student_id"];
            $_SESSION["full_name"] = $user["full_name"];
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid username or password.";
            echo $error;
        }

        $query->close();
    } else {
        $error = "Please enter both username and password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <div class = "form">
        <form action="index.php" method="post">
            <h1>Login</h1>
            <label>Username: </label><input type="text" name="username"><br><br>
            <label>Password: </label><input type="password" name="password"><br><br>
            <input type = "submit" value = "Login" id="btn">
        </form>
    </div>
</body>
</html> 
<?php
    //if (isset())
?>