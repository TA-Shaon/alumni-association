<?php
session_start();
if(isset($_SESSION['s_id'])&& isset($_SESSION['s_name']) && isset($_SESSION['s_email'])){
    function __autoload($class){
        include_once $class.'.php';
    }
    include_once 'memberHeader.php';
    ?>
    <div class="member_content" style="text-align: center; color:#2F2FA1; font-family: arial,Helvetica,Sans-serif;">
        <h3>Edit Events</h3>
        <?php
    if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['eventTitle']) && isset($_POST['eventDescription'])  && isset($_POST['eventDate'])){
        $editEvent= new Events();
        $dbOut=$editEvent->editDatabaseEvent($_SESSION['e_id'],$_POST['eventTitle'],$_POST['eventDate'],$_POST['eventDescription']);
        if($dbOut=="no"){
            echo "Something went wrong when updating data.....Try again Please. ";
        }else{
            echo "<script>";
                echo "alert('Data Updated Correctly.')";
            echo "</script>";
            header("Location:editEvent.php");
            unset($_SESSION['e_id']);
        }
    }else{
        if(isset($_GET['editId'])){
            $selectEvent= new Events();
            $value=$selectEvent->findEventRows($_GET['editId']);
            $dbValue=mysql_fetch_array($value);
            $_SESSION['e_id']= $dbValue['id'];
            ?>
            <div class="edit_section">
                <form action="editEvent.php" method="post" style="border:1px solid gray;padding: 20px; width: 600px;margin-left:305px;margin-top: 40px;margin-bottom: 30px; ">
                    <table cellpadding="4">
                        <tr>
                            <td>Event Title:</td>
                            <td><input type="text" name="eventTitle" required  value="<?php echo $dbValue['title'];?>" style="height: 35px; width:400px;"></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td><input type="date"  name="eventDate" value="<?php echo $dbValue['date'];?>" style="height: 35px; width:200px;" required ></td>
                        </tr>
                        <tr>
                            <td>Event Description:</td>
                            <td><textarea type="text" name="eventDescription" rows="15" required style=" width:400px;" placeholder="Date,  Venue,  Description,  Schedule,  For Whom"> <?php echo $dbValue['description']; ?> </textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" id="submit_button" value="Save" style="" ></td>
                        </tr>
                    </table>
                </form>
            </div>

        <?php
        }else{
            $showEvent=new Events();
            $data=$showEvent->showMyEvents();
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
                        echo "<tr>";
                        if($i%2==0){
                            echo "<td style='background: #ededed;text-align:center;'>". $row['title']."</td>";
                            echo "<td style='background: #ededed;text-align:center;'>". $row['date']."</td>";
                            echo "<td style='background: #ededed;text-align:center;'>". $row['description']."</td>";
                            echo "<td style='background: #ededed;text-align:center;'> <img src='$row[photo]' height='60' width='80'/>" ."</td>";
                            echo "<td style='background: #ededed;text-align:center;'>". $convener['name']."</br> <span style='font-size:10px;'>".$convener['batch']."</span></td>";
                            echo "<td style='background: #ededed;text-align:center;'><a href='editEvent.php?editId=".$row['id']."' id='eventEdit'>Edit</a>";
                        }else{
                            echo "<td style='text-align:center;background-color:#D7F6FB;'>". $row['title']."</td>";
                            echo "<td style='text-align:center;background-color:#D7F6FB;'>". $row['date']."</td>";
                            echo "<td style='text-align:center;background-color:#D7F6FB;'>". $row['description']."</td>";
                            echo "<td style='text-align:center;background-color:#D7F6FB;'><img src='$row[photo]' height='60' width='80'/>" ."</td>";
                            echo "<td style='text-align:center;background-color:#D7F6FB;'>". $convener['name']."</br> <span style='font-size:10px;'>".$convener['batch']."</span></td>";
                            echo "<td style='text-align:center;background-color:#D7F6FB;'><a href='editEvent.php?editId=".$row['id']."' id='eventEdit'>Edit</a>";
                        }
                        echo"</tr>";
                        $i++;
                    }
                    echo "</table>";
                }
            }
        }
    }
        ?>
    </div>
    <?php
    include_once 'footer.php';
}else{
    echo "You Are Not Logged In. Please Login First. ";
    echo "<a href='index.php'> Go Back</a>";
}