<?php
function __autoload($class){
    include_once $class.'.php';
}
include_once 'header.php';
echo "<div class='content' style='padding: 20px;'>";
    if(isset($_GET['id'])){
        $memberId=$_GET['id'];
        $showMem= new AlumniMembers();
        $dbVal=$showMem->getMemberInfo($memberId);
        if($dbVal=="no"){
            echo "<div style='text-align: center;padding: 30px;border:1px solid black;width: 700px;margin-left: 300px;font-size: 22px;'>";
            echo "Some Problem Occurred";
            echo "</div>";
        }else{
            if(mysql_num_rows($dbVal)==1){
                $row=mysql_fetch_array($dbVal);
            ?>
                <div class="memInfo">
                    <div class="upperRow">
                        <div id="memName">
                            <?php echo "<span style='font-size:35px;'>".$row['name']."</span></br>";?>
                            <?php echo "Email: ".$row['email']."</br>";?>
                            <?php echo "Phone: ".$row['phone']."</br>";?>
                            <?php echo "FaceBook: ".$row['fb_pro']."</br>";?>
                        </div>
                        <div id="memPhoto">
                            <?php echo "<img src='$row[photo]' height='140' width='160' style='margin-top: 5px;'>";?>
                        </div>
                    </div>
                    <div class="lowerRow">
                        <div id="identity">
                            <?php echo "Batch: ".$row['batch']."</br>";?>
                            <?php echo "Roll: ".$row['roll']."</br>";?>
                            <?php echo "Date of Birth: ".$row['dob']."</br>";?>
                            <?php echo "Blood Group: ".$row['blood']."</br>";?>
                            <?php echo "Permanent Address: ".$row['per_address']."</br>";?>
                        </div>
                        <div id="officeInfo">
                            <?php echo "Profession: ".$row['profession']."</br>";?>
                            <?php echo "Company name: ".$row['com_name']."</br>";?>
                            <?php echo "Company Address: ".$row['com_address']."</br>";?>
                            <?php echo "Current Address: ".$row['cu_address']."</br>";?>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
echo "</div>";

include_once 'footer.php';
?>
