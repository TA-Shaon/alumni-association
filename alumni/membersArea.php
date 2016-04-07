<?php
session_start();
if(isset($_SESSION['s_id'])&& isset($_SESSION['s_name']) && isset($_SESSION['s_email'])){
    function __autoload($class){
        include_once $class.'.php';
    }
    $myEvent=new Events();
    $dbValue=$myEvent->getMyEvents($_SESSION['s_id']);
    include_once 'memberHeader.php';
    echo "<div class='member_content'>";
        if($dbValue<=0){
            echo "<div style='text-align: center;padding: 30px;border:1px solid black;margin-top: 80px;width: 700px;margin-left: 300px;font-size: 22px;'>";
                echo "Your History Is Currently Empty.";
            echo "</div>";
        }else{
            echo "<div style='text-align: center;padding: 30px;border:1px solid black;margin-top: 80px;width: 700px;margin-left: 300px;font-size: 22px;'>";
                echo $_SESSION['s_name'] ." Your Number of Organized Events is :". $dbValue;
            echo "</div>";
        }
    echo "</div>";

    include_once 'footer.php';
}else{
   echo "You Are Not Logged In. Please Login First. ";
    echo "<a href='index.php'> Go Back</a>";
}
