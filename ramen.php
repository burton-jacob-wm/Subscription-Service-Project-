<?php
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
                if ($_SESSION['userinfo']){
                    echo '<a href="profile.php">Profile</a>';
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
            <h1 style="color: #000">Subscribe for notifications!</h1>
            <h3>Register your Email.</h3>
            <form action="addemail.php" method="post">
                <label for="registerUser">Email:</label>
                <input type="text" name="email" id="registerUser" maxlength="32" required />
                <br>
                <label for="registerPass">First Name:</label>
                <input type="text" name="firstName" id="registerPass" maxlength="14" required />
                <br>
                <label for="confirm">Last Name:</label>
                <input type="text" name="lastName" id="confirm" maxlength="14" required />
                <br>
                <button type="submit" name="register" value="1">Subscribe</button>
                <br>
                <?php echo $_SESSION['success']; ?>
                <?php echo $_SESSION['error']; ?>
            </form>
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
