<?php
require_once ('dbcon.php');
session_start();

if(empty($_POST['username']) && empty($_POST['password'])){
    $errorMessage = "<p>Username and Password Required.</p>";
}
if(empty($_POST['username']) && !empty($_POST['password'])){
    $errorMessage = "<p>Password is Required.</p>";
}
if(!empty($_POST['username']) && empty($_POST['password'])){
    $errorMessage = "<p>Username is Required.</p>";
}
if($_POST['password'] <> $_POST['confirm']){
    $errorMessage = "<p>Passwords did not match.</p>";
}

if(empty($errorMessage)){

    $query = $dbc->prepare("INSERT INTO users (userId, username, password, email) VALUES (:id, :username, SHA(:password), :email)");
    $result = $query->execute(
        array(
            'id'       => NULL,
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email'    => $_POST['email']
        )
    );
    if ($result) {
        $to = $_POST['email'];
        $first_name = $_POST['username'];
        $msg = $_POST['username'] . ", thank you for registering.";
        mail($to, 'Ramen It Over Confirmation', $msg, 'From:' . $from);

        $success = "<p>Successfully Registered.</p>";

        unset($_POST);
    }
    else{
        $errorMessage = "<p>There was a problem registering.</p>";
    }

}

$_SESSION['error'] = $errorMessage;
$_SESSION['success'] = $success;

header("Location: login.php");