<?php
session_start();
function __autoload($class_name){
    include_once $class_name.'.php';
}
if($_POST){
    if(isset($_POST['login_email'])&& isset($_POST['login_password'])) {
        $db = Database::getInstance();
        $link= $db->getConnection();
        $sql_cmd = "select * from members where email='$_POST[login_email]' and password='$_POST[login_password]'";
        $result =mysql_query($sql_cmd,$link);
        if($result){
            $count = mysql_num_rows($result);
            if ($count==1){
                $row=mysql_fetch_array($result);
                if(!empty( $_SESSION['s_id']) ||!empty( $_SESSION['s_name']) || !empty( $_SESSION['s_email']) ){
                    session_unset();
                    header("Location:index.php");
                }else{
                    $_SESSION['s_id']=$row['id'];
                    $_SESSION['s_name']=$row['name'];
                    $_SESSION['s_email']=$row['email'];
                    header("Location:membersArea.php");
                }
            }else{
                echo "Redundancy in Your Email or Password. Please Try Again.";
            }
        }else{
            echo "Your Email or Password is Incorrect. Please Try Again.";
        }

    }else{
        echo "Your Username or Password field is empty . Please Try Again.";
    }
}
