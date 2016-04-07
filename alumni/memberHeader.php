<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="jquery-1.11.2.min.js"></script>
    <script src="custom.js"></script>
</head>

<body>
<div class="header">
    <img src="dep_logo.png" alt="cse logo"/>
    <h1>Dept of CSE||ALUMNI</h1>
</div>
<div class="nav">
    <ul class="myMenu">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">My Events</a>
            <ul>
                <li><a href="newEvent.php">Add My Event</a></li>
                <li><a href="editEvent.php">Edit My Event</a></li>
            </ul>
        </li>
        <li><a href="editProfile.php">Edit Profile</a></li>
        <li><a href="allEvents.php">All Events</a></li>
        <?php echo "<li><a href='membersArea.php'>".$_SESSION['s_name']."</a></li>";?>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>





