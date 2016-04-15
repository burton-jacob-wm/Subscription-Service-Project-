<?php
require_once ('dbcon.php');
session_start();

if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email'])){
    $errorMessage = "<p>All fields required.</p>";
}
if(!empty($_POST['firstName']) && empty($_POST['lastName']) && !empty($_POST['email'])){
    $errorMessage = "<p>Last name is Required.</p>";
}
if(empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email'])){
    $errorMessage = "<p>First name is Required.</p>";
}
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && empty($_POST['email'])){
    $errorMessage = "<p>Email is Required.</p>";
}

if(empty($errorMessage)){

    $query = $dbc->prepare("INSERT INTO email_list (emaillistid, email, firstName, lastName) VALUES (:id, :email, :firstName, :lastName)");
    $result = $query->execute(
        array(
            'id'       => NULL,
            'email' => $_POST['email'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName']
        )
    );
    if ($result) {
        $success = "<p>Successfully Subscribed. <br> Thank you!</p>";

        unset($_POST);
    }
    else{
        $errorMessage = "<p>There was a problem subscribing.</p>";
    }

}

$_SESSION['error'] = $errorMessage;
$_SESSION['success'] = $success;

session_start();
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Ramen It Over</title>

    <link href="main.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<div class="header-cont">
    <div class="header">
        <ul id="MenuBar2" class="MenuBarHorizontal">
            <li><a href="index.php">Home</a></li>
            <li>
                <?php
                if ($_SESSION['username']){
                    echo '<a href="editlikes.php">Edit Likes</a>';
                }
                else {
                    echo '<a href="login.php">Login</a>';
                }
                ?>
            </li>
            <li><a href="ramen.php">Ramen Off</a></li>
        </ul>
        <h1 id="logoText"><span id="headertext">Ramen It Over</span></h1>
        <!--end header --></div>
    <!--end headercontainer --></div>
<div class="container">
    <div class="content">
        <img src="images/logo.png" class="centerImg">
        <hr />
        <div id="subscribe">
            <h1 style="color: #000">
                <?php echo $_SESSION['success']; ?>
                <?php echo $_SESSION['error']; ?>
            </h1>
            <h3>Thank you for signing up for <i>The Ramen Off</i> updates.</h3>
            <p>We will keep you updated as more and more information becomes available.</p>
            <a href="index.php"> &gt; Back to Home</a>
        </div>

        <hr />
        <!-- end .content --></div>
    <!-- end .container --></div>
<div class="footer-cont">
    <div class="footer">
        <p>Copyright © 2016. All rights reserved.</p>
        <!-- end .footer --></div>
    <!-- end footer container --></div>
<script type="text/javascript">
    var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>
</body>
</html>
