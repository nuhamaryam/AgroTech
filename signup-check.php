
<?php 
session_start(); 
include "logindbconn.php";

if (
    isset($_POST['uname']) && isset($_POST['password']) &&
    isset($_POST['name']) && isset($_POST['re_password']) &&
    isset($_POST['mobile']) && isset($_POST['email'])
) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);
    $mobile = validate($_POST['mobile']);
    $email = validate($_POST['email']);

    $user_data = 'uname=' . $uname . '&name=' . $name . '&mobile=' . $mobile . '&email=' . $email;

    if (empty($uname) || empty($pass) || empty($re_pass) || empty($name) || empty($mobile) || empty($email)) {
        header("Location: signup.php?error=All fields are required&$user_data");
        exit();
    } elseif ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {

        // hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE username='$uname' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is already taken&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO users(username, password, name, mobile, email) VALUES('$uname', '$pass', '$name', '$mobile', '$email')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=An unknown error occurred&$user_data");
                exit();
            }
        }
    }
    
} else {
    header("Location: signup.php");
    exit();
}
?>
