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
        <h1><b>Ramen for Ramen Lovers</b></h1>
        <h3>Find the perfect Ramen for you.</h3>
        <hr />
        <table id="ramenDisplay">
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>16</td>
            </tr>
            <tr>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>17</td>
            </tr>
            <tr>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>18</td>
            </tr>
            <tr>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>19</td>
            </tr>
            <tr>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>20</td>
            </tr>
        </table>

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
