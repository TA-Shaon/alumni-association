<?php
class EventAttend {
    public $uId;
    public $eId;//<--

    public function attendEvents(){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd1="insert into eventattend (eventId, memberId)values('$this->eId','$this->uId')";
        $result=mysql_query($sql_cmd1,$link) or die('An Error occur when insert: '.mysql_error());
        if($result){
            return "yes";
        }else{
            return "no";
        }
        mysql_close($link);
    }

    public function checkAttendance(){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd1="select id from eventattend where eventId='$this->eId' and memberId='$this->uId' ";
        $result=mysql_query($sql_cmd1,$link) or die('An Error occur when insert: '.mysql_error());
        $count=mysql_num_rows($result);
        if($count==1){
            return "yes";
        }else{
            return "no";
        }
        mysql_close($link);
    }

    public function showAttendance(){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd1="SELECT DISTINCT m.photo, m.name FROM members m, events e, eventattend ea WHERE m.id = ea.memberId AND ea.eventId ='$this->eId'";
        $result=mysql_query($sql_cmd1,$link) or die('An Error occur '.mysql_error());
        if($result){
            return $result;
        }else{
            return "no";
        }
        mysql_close($link);
    }
}
