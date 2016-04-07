<?php
function __autoload($class){
    include_once $class.'.php';
}
$lastEvent=new Events();
$dbValue=$lastEvent->getLastEvent();
include_once 'header.php';
?>
<div class="content">
    <div class="slider">
        <img src="cover.jpg" alt="Students of Alumni"/>
        <img src="cover1.jpg" alt="Students of Alumni"/>
        <img src="cover2.jpg" alt="Students of Alumni"/>
        <img src="cover3.jpg" alt="Students of Alumni"/>
    </div>
	<div style="text-align:center;margin-top: 70px;">
	     <h3 style="color:#286090;">Teachers Message</h3>
	</div>	 
		
    <div class="row_teacher">   <!--1st Division  under slide-->
		<div class="left1">
			<div id="teacher_image"><img src="teacher1.jpg" height="150" width="150"/></div>
            <div id="teacher_mgs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </div>
		</div>
		<div class="right1">
            <div id="teacher_image"> <img src="teacher2.jpg" height="150" width="150"/></div>
            <div id="teacher_mgs"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
		</div><!---->
	</div>
    <?php
    if($dbValue=="no"){
        //Do Nothing...........
    }else{
        $row=mysql_fetch_array($dbValue);
        echo "<div style='font-weight: bolder;font-size: 25px;text-align: center; background-color: #efefef;padding-top:10px;'>";
            echo "Last Event";
        echo "</div>";
        echo "<div class='row_event'>";
            echo "<div id='event_photo'>";
                echo "<img src='$row[photo]' height='300' width='220'style=''>";
                echo "<div id='eventCover'>";
                    echo "Event Photo";
                echo "</div>";
            echo "</div>";
            echo "<div id='event_desc'>";
                echo "<table>";
                    echo "<tr><td class='showTable2'>Event Title </td><td class='showTable2td'>".$row['title']."</td></tr>";
                    echo "<tr><td class='showTable2'>Event date  </td><td class='showTable2td'>".$row['date']."</td></tr>";
                    echo "<tr><td class='showTable2'>Description </td><td class='showTable2td'> ".$row['description']."</td></tr>";
                echo "</table>";
            echo "</div>";
            echo "<div id='event_attend'>";
                $eventAttendance= new EventAttend();
                $eventAttendance->eId=$row['id'];
                $result=$eventAttendance->showAttendance();
                if($result){
                 $count=mysql_num_rows($result);
                    if($count==0){
                        echo " No attendance yet. Be the first of attending this Event. ";
                    }else{
                        while($dbVal=mysql_fetch_array($result)){
                            echo "<table>";
                            echo "<tr><td><img src='$dbVal[photo]' height='40' width='60' style='margin-top: 5px;'></td><td id='nameColor'>".substr($dbVal['name'],0,20)."</td></tr>";
                            echo "</table>";
                        }

                    }
                }
            echo "</div>";
        echo "</div>";
    }
    ?>


</div>
<?php
include_once 'footer.php';
?>