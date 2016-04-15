<?php
session_start();

$registered = $_SESSION["registered"];
$UserName = $_SESSION["username"];

if(isset($_SESSION['username'])){
    header('location: index.php');
}

require_once('dbcon.php');


//START Login
$error = false;
$success = false;
if(!$_POST['username']){
    $error .= '<p>Username is a required field!</p>';
}

if(!$_POST['password']){
    $error .= '<p>Password is a required field!</p>';
}
if(@$_POST['login']) {

    $query = $dbc->prepare("SELECT * FROM users WHERE userName = :username AND password = SHA(:password)");
    $userinfo = $query->execute(
        array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        )
    );
    $userinfo = $query->fetch();

    if ($userinfo) {

        $success = "User, " . $_POST['user'] . " was successfully logged in.";


        $_SESSION['userinfo'] = $userinfo;


        header("Location: index.php");
    } else {
        $success = "There was an error logging into the account.";
        header("Location: login.php");
    }
}

?>