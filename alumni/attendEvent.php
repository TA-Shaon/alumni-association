<?php
session_start();
function __autoload($class){
    include_once $class.'.php';
}
if(isset($_SESSION['s_id'])&& isset($_SESSION['s_name']) && isset($_SESSION['s_email'])){
    include_once 'memberHeader.php';

    echo "<div class='member_content' style='text-align: center; color:#2F2FA1; font-family: arial,Helvetica,Sans-serif;'>";
    echo "<h3>Event Attend Confirmation</h3>";
    if(isset($_REQUEST['uId'])&&isset($_REQUEST['eId'])){

        $attendee=new EventAttend();
        $attendee->uId=$_REQUEST['uId'];
        $attendee->eId=$_REQUEST['eId'];
        $data=$attendee->attendEvents();
        if($data=="yes"){
            echo "Thank you for attend. Have fun.";
        }else{
            echo "Sorry, something went wrong.";
        }
    }
    echo "</div>";

    include_once 'footer.php';
}else{
    echo "You Are Not Logged In. Please Login First. ";
    echo "<a href='index.php'> Go Back</a>";
}