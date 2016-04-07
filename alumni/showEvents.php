<?php
function __autoload($class){
    include_once $class.'.php';
}
include_once 'header.php';
echo "<div class='content' style='margin-top: -330px;'>";
echo "<h3 style='text-align: center;padding-top: 15px;'>List of all Event</h3>";
echo "<div>";
    $showEvent=new Events();
    $data=$showEvent->showAllEvents();
    if($data=="no"){
        echo "Sorry, There Is an Error.";
    }else{
        $count=mysql_num_rows($data);
        if($count==0){
            echo "There is No Events Available. ";
        }else{
            while($row=mysql_fetch_array($data)){
                $value=$showEvent->eventConvener($row['id']);
                $convener=mysql_fetch_array($value);

                echo "<div class='mainRow'>";
                    echo "<div id='leftSide'>";
                        echo "<div id='titleBar'>";
                            echo substr($row['title'],0,70);
                        echo "</div>";
                        echo "<div id='eventContent'>";
                            echo "<div id='coverPhoto'>";
                                echo "<img src='$row[photo]' height='204' width='200'/>";
                            echo "</div>";
                            echo "<div id='eventDesc'>";
                                echo "<div id='desc'>";
                                    echo $row['description'];
                                echo "</div>";
                                echo "<div id='timeConvener'>";
                                    echo "<table>";
                                        echo "<tr>";
                                            echo "<td>Event Date:</td><td>". substr($row['date'],0,10)."</td>";
                                            echo "<td><span id='conName'>Convener:</span></td><td>". substr($convener['name'],0,50)." <span style='font-size:10px;'>".$convener['batch']."</span></td>";
                                        echo "</tr>";
                                    echo "</table>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div id='rightSide'>";
                        echo "<div id='verticalText'>";
                            echo "Event Attendance";
                        echo "</div>";

                        echo "<div id='eventAttend'>";
                        $eventAttendance= new EventAttend();
                        $eventAttendance->eId=$row['id'];
                        $result=$eventAttendance->showAttendance();
                        if($result){
                            $count=mysql_num_rows($result);
                            if($count==0){
                                echo "No attendance yet.";
                            }else{
                                while($dbVal=mysql_fetch_array($result)){
                                    echo "<table>";
                                    echo "<tr><td><img src='$dbVal[photo]' height='40' width='60' style='margin-top: 5px;'></td><td>".substr($dbVal['name'],0,13)."</td></tr>";
                                    echo "</table>";
                                }
                            }
                        }
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

            }
        }
    }
    echo "</div>";
echo "</div>";
include_once 'footer.php';
?>
