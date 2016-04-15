<?php
require_once ('authenticate.php');
require_once ('dbcon.php');
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Ramen It Over</title>

    <link href="admin.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<div class="header-cont">
    <div class="header">
        <h1 id="logoText"><span id="headertext">Ramen It Over</span></h1>
        <!--end header --></div>
    <!--end headercontainer --></div>
<div class="container">
    <div class="content">
        <h1><b>Admin - Email</b></h1>
        <h3>Email sending to Subscribers of The Ramen Off</h3>
        <hr />

        <div style="padding: 8px">
            <form method="post" action="sendemail.php">
                <label for="subject">Subject of email:</label><br>
                <input id="subject" name="subject" type="text" size="30" value=""/><br>
                <label for="Content">Email Content:</label><br>
                <textarea id="content" name="content" rows="8" cols="40"></textarea><br><br>
                <input type="submit" name="Submit" value="Submit" /> <?php echo $error ?>
            </form>
            <p><a href="admin.php">&gt;&gt;Back to Admin</a></p>
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
</body>
</html>
