<?php
session_start();
if(isset($_SESSION['userinfo'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Ramen It Over - Login</title>

    <link href="main.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>

    <script src="jquery-2.2.0.min.js"></script>
    <script src="login.js"></script>


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<div class="header-cont">
    <div class="header">
        <ul id="MenuBar2" class="MenuBarHorizontal">
            <li><a href="index.php">Home</a></li>
            <li>
                <?php
                if ($_SESSION['userName']){
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
        <h1><b>Ramen for Ramen Lovers</b></h1>
        <h3>Find the perfect Ramen for you.</h3>
        <hr />
        <div id="break">
        <div id="login">
            <h1 style="color: #000">Login</h1>
            <form action="signin.php" method="post">
                <label for="loginUser">Username:</label>
                <input type="text" name="username" id="loginUser" maxlength="14" required />
                <br>
                <label for="loginPass">Password:</label>
                <input type="password" name="password" id="loginPass" maxlength="14" required />
                <br><br>
                <button type="submit" name="login" value="1">Continue</button> &nbsp; <button type="button" onclick="registerForm()">Register</button>
                <br><br>
                <?php echo $_SESSION['success']; ?>
                <?php echo $_SESSION['error']; ?>
            </form>
        </div>

        <div id="register">
            <h1 style="color: #000">Register</h1>
            <form action="signup.php" method="post">
                <label for="registerUser">Username:</label>
                <input type="text" name="username" id="registerUser" maxlength="14" required />
                <br>
                <label for="registerEmail">Email:</label>
                <input type="email" name="email" id="registerEmail" maxlength="30" required />
                <br>
                <label for="registerPass">Password:</label>
                <input type="password" name="password" id="registerPass" maxlength="14" required />
                <br>
                <label for="confirm">Confirm Password:</label>
                <input type="password" name="confirm" id="confirm" maxlength="14" required />
                <br><br>
                <button type="submit" name="register" value="1">Register</button> &nbsp; <button type="button" onclick="loginForm()">Already have an Account</button>
                <br><br>
                <?php echo $_SESSION['success']; ?>
                <?php echo $_SESSION['error']; ?>
            </form>
        </div>
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
