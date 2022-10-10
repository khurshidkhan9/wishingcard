<?php
require_once 'connection.php';

// variable declaration
$username = "";
$email = "";

if (isset($_POST['register_btn'])) {
    register();
}
if(isset($_POST['login_btn'])){
    login();
}

function register()
{

    global $conn;

    $username = eString($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_pwd = $conn->real_escape_string($_POST['confirm_password']);
    $user_type = $conn->real_escape_string($_POST['user_type']);

    if (empty($username)) {
        $_SESSION['error'] = "Username is required";
    }
    if (empty($email)) {
        $_SESSION['error'] = "Email is required";
    }
    if (empty($password)) {
        $_SESSION['error'] = "Password is required";
    }
    if (empty($confirm_pwd)) {
        $_SESSION['error'] = "Confirm Password does not match";
    }
    if (empty($username) && empty($email) && empty($password)) {
        $_SESSION['error'] = "Username, Email, Password is required";
    }

    $password = md5($password);
    if (isset($_POST['user_type'])) {
        $sql = "INSERT INTO users (username, email, user_type, password) VALUES ('$username','$email', '$user_type', '$password')";
        $result = $conn->query($sql);
        $_SESSION['success'] = "New user successfully created!!";
        header('location: ../index.php');
    } else {
        $sql = "INSERT INTO users (username, email, user_type, password) VALUES ('$username','$email', 'user', '$password')";
        $result = $conn->query($sql);
        $logged_in_user_id = $conn->insert_id;

        $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
        $_SESSION['success'] = "You are now logged in";

        header('location: ../index.php');
    }

    // header('location: ../register.php');

}

function login()
{
    global $conn;

    $username = eString($_POST['username']);
    $password = eString($_POST['password']);
    if (empty($username)) {
        $_SESSION['error'] = "username is required";
    }
    if (empty($password)) {
        $_SESSION['error'] = "Password is required";
    }

    $password = md5($password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 1) {
        $logged_in_user = mysqli_fetch_assoc($result);
        if($logged_in_user['user_type'] == 'admin'){
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success'] = "You are successfuly logged In";
            header('location: ../admin/index.php');
        }else{
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success'] = "You are successfuly logged In";
            header('location: ../index.php');
        }
    }else{
        $_SESSION['error'] = "Wrong username/password combination";
        header('location: ../login.php');
    }
}

// return user array from their id
function getUserById($id)
{
    global $conn;
    $query = $conn->query("SELECT * FROM users WHERE id=" . $id);

    $user = mysqli_fetch_assoc($query);
    return $user;
}

function eString($value)
{
    global $conn;
    return $conn->real_escape_string(trim($value));
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
