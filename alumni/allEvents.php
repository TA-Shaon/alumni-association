<?php
session_start();
function __autoload($class){
    include_once $class.'.php';
}
if(isset($_SESSION['s_id'])&& isset($_SESSION['s_name']) && isset($_SESSION['s_email'])){
    include_once 'memberHeader.php';

    echo "<div class='member_content' style='text-align: center; color:#2F2FA1; font-family: arial,Helvetica,Sans-serif;'>";
    echo "<h3>List of all Event</h3>";

    $showEvent=new Events();
    $attended= new EventAttend();
    $data=$showEvent->showAllEvents();
    if($data=="no"){
        echo "Sorry, There Is an Error.";
    }else{
        $i=1;
        $count=mysql_num_rows($data);
        if($count==0){
            echo "There is No Events Available. ";
        }else{
            echo "<table cellpadding='5'>";
            echo "<th style='background: #ededed;'>Title</th>";
            echo "<th style='background: #ededed;'>Date</th>";
            echo "<th style='background: #ededed;'>Description</th>";
            echo "<th style='background: #ededed;'>Photo</th>";
            echo "<th style='background: #ededed;'>convener</th>";
            echo "<th style='background: #ededed;'>Action</th>";
            while($row=mysql_fetch_array($data)){
                $value=$showEvent->eventConvener($row['id']);
                $convener=mysql_fetch_array($value);

                //checking attendance
                $attended->uId=$_SESSION['s_id'];
                $attended->eId=$row['id'];
                $res=$attended->checkAttendance();
                echo "<tr>";
                if($i%2==0){
                    echo "<td style='background: #ededed;text-align:center;'>". $row['title']."</td>";
                    echo "<td style='background: #ededed;text-align:center;'>". $row['date']."</td>";
                    echo "<td style='background: #ededed;text-align:center;'>". $row['description']."</td>";
                    echo "<td style='background: #ededed;text-align:center;'> <img src='$row[photo]' height='60' width='80'/>" ."</td>";
                    echo "<td style='background: #ededed;text-align:center;'>". $convener['name']."</br> <span style='font-size:10px;'>".$convener['batch']."</span></td>";
                    if($res=="yes"){
                        echo "<td style='background: #ededed;text-align:center;'>Attended</td>";
                    }else{
                        echo "<td style='background: #ededed;text-align:center;'><a href='attendEvent.php?uId=".$_SESSION['s_id']." & eId=$row[id] ' id='eventAttend'>Attend</a></td>";
                    }
                }else{
                    echo "<td style='text-align:center;background-color:#D7F6FB;'>". $row['title']."</td>";
                    echo "<td style='text-align:center;background-color:#D7F6FB;'>". $row['date']."</td>";
                    echo "<td style='text-align:center;background-color:#D7F6FB;'>". $row['description']."</td>";
                    echo "<td style='text-align:center;background-color:#D7F6FB;'><img src='$row[photo]' height='60' width='80'/>" ."</td>";
                    echo "<td style='text-align:center;background-color:#D7F6FB;'>". $convener['name']."</br> <span style='font-size:10px;'>".$convener['batch']."</span></td>";
                    if($res=="yes"){
                        echo "<td style='text-align:center;background-color:#D7F6FB;'>Attended</td>";
                    }else{
                        echo "<td style='text-align:center;background-color:#D7F6FB;'><a href='attendEvent.php?uId=".$_SESSION['s_id']." & eId=$row[id]' id='eventAttend'>Attend</a></td>";
                    }
                }
                echo"</tr>";
                $i++;
            }
            echo "</table>";
        }
    }

    echo "</div>";

    include_once 'footer.php';
}else{
    echo "You Are Not Logged In. Please Login First. ";
    echo "<a href='index.php'> Go Back</a>";
}