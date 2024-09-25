<?php 
session_start(); 
include "logindbconn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: loginindex.php?error=User Name is required");
        exit();
    } elseif(empty($pass)){
        header("Location: loginindex.php?error=Password is required");
        exit();
    } else {
        // Hash the password (consider using stronger hashing methods like bcrypt)
        $pass = md5($pass);

        // Your database connection and query
        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // Store user information in session variables
            $_SESSION['username'] = $row['username']; // Assuming 'username' is the correct field name
            $_SESSION['name'] = $row['name']; // Assuming 'name' is the correct field name
            $_SESSION['id'] = $row['id']; // Assuming 'id' is the correct field name

            // Redirect to the desired page after successful login
            header("Location: buyers/index.html");
            exit();
        } else {
            header("Location: loginindex.php?error=Incorrect Username or Password");
            exit();
        }
    }
} else {
    header("Location: loginindex.php");
    exit();
}
?>
