<?php session_start();?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="unslider/css/unslider.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div class="header">
         <img src="dep_logo.png" alt="cse logo"/>
         <h1>Dept of CSE||ALUMNI</h1>
	</div>
    <div class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="alumnus.php">Alumni</a></li>
            <li><a href="showEvents.php">Event</a></li>
            <?php
            if(isset($_SESSION['s_id']) && isset($_SESSION['s_email'])){
                echo "<li><a href='membersArea.php'>".$_SESSION['s_name']."</a></li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }else{
                echo "<li><a href='registration.php'>Registration</a></li>";
                echo "<li><a href='#' id='login_call'>Login</a></li>";
            }
            ?>
            <li><a href="contactUs.php" id="">Contact Us</a></li>
            <li><a href="cse.php" id="">CSE At a glance</a></li>
        </ul>
    </div>

    <div id="fade"></div>

    <div id="login_form">
        <div class="header_login">
            <img src="dep_logo.png" alt="cse logo"/>
            <h3>Dept of CSE||ALUMNI</h3>
        </div>
        <form method="POST" action="checkLogin.php" style="margin-top:20px;margin-left:45px; ">
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="login_email" required style="width:220px;height:30px; margin-bottom:15px;"/></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="login_password" required style="width:220px;height:30px;margin-bottom:15px;"/></td>
                </tr>
            </table>
            <input type="submit"  value="Login" id="submit_button" style="margin-left: 237px;"/>
        </form>
        <div id="footer_login">
            <button type="button" id="close_login" style="padding: 2px; font-weight: bold;margin-left: 340px;margin-top: 8px;">Close</button>
        </div>
    </div>