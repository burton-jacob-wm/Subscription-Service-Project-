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
            <?php
            $from = 'ramenOff@ramen.com';
            $subject = $_POST['subject'];
            $text = $_POST['content'];

            if(empty($subject) && empty($text)){
                $error = "<p class='error'>The subject and body was left empty.</p>";
            }

            if(empty($subject) && !empty($text)){
                $error = "<p class='error'>The subject was left empty.</p>";
            }

            if(!empty($subject) && empty($text)){
                $error = "<p class='error'>The body was left empty.</p>";
            }
            else{

                $query = "SELECT * FROM email_list";
                $stmt = $dbc->prepare($query);
                $stmt->execute();
                $result= $stmt->fetchAll();
                echo '<p>';
                foreach($result as $row) {
                    $to = $row['email'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $msg = "Dear $first_name $last_name,\n$text";
                    mail($to, $subject, $msg, 'From:' . $from);
                    echo 'Emails sent to: ' . $to . '<br>';

                }
                echo '</p>';
                echo '<p><a href="admin.php">&gt;&gt;Back to Admin</a></p>';
            }

            if(isset($error)){
                ?>
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
                <?php
            }
            ?>
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