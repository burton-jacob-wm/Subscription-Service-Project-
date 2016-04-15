<?php
session_start();
if(empty($_SESSION['userinfo'])){
    header("Location: index.php");
}
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
<?php
if (isset($_SESSION['userinfo']['userid']) && (isset($_POST['$favorite']) || isset($_POST['flavoring']) || isset($_POST['imagename']) )) {
    $id = $_POST['id'];
    $favorite = $_POST['favorite'];
    $flavoring = $_POST['flavoring'];
    $imagename = $_POST['imagename'];
}
else {
    echo '<p class="error">Sorry, no high score was specified for approval.</p>';
}

if (isset($_POST['submit'])) {
    $dbc = NEW PDO('mysql:host=127.0.0.1;dbname=ramenitdb', 'root', 'root');


    $query = "UPDATE users SET favorite = :favorite,flavoring = :flavoring,imagename = :imagename WHERE id = :id";
    $data = $dbc->prepare($query);
    $data->execute(
        array(
            'id' => $_SESSION['userinfo']['userid'],
            'favorite' => $favorite,
            'flavoring' => $flavoring,
            'imagename' => $imagename
        )
    );


    echo '<p>The profile was successfully approved.';

    header("Location: profile.php");
}
?>
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
        <h3><img src="images/<?php echo $_SESSION['userinfo']['imagename'] ?>" id="profilePic"></h3>
        <hr />
        <form method="post">
        <p>Favorite Ramen Type: <input type="text" name="favorite" value="<?php echo $_SESSION['userinfo']['favorite'] ?>" placeholder="Favorite Ramen"></p>
        <p>Additional Ramen Flavoring : <input type="text" name="flavoring" value="<?php echo $_SESSION['userinfo']['flavoring'] ?>" placeholder="Additional Ingredients"></p>
        <button type="submit" name="submit">Submit</button>
        <hr />
        </form>
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
