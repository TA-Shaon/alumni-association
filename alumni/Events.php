<?php
class Events {
    public $title;
    public $date;
    public $description;
    public $photo;

    function __construct($item=array()){
        if(!is_array($item)){
            echo "Sorry, Something went wrong. Insert again.";
        }
        if(count($item)>0){
            foreach($item as $key=>$values){
                $this->$key=$values;
            }
        }
    }

    public function insertEvent(){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd1="insert into events (title,date,description,photo,organizer)values('$this->title','$this->date','$this->description','$this->photo','$_SESSION[s_id]')";
        $result=mysql_query($sql_cmd1,$link) or die('An Error: '.mysql_error());
        if($result){
            return "yes";
        }else{
            return "no";
        }
        mysql_close($link);
    }

    public function showAllEvents(){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd2="select * from events order by id desc ";
        $result=mysql_query($sql_cmd2,$link) or die('An Error: '.mysql_error());
        if($result){
            return $result;
        }else{
            return "no";
        }
        mysql_close($link);
    }

    public function showMyEvents(){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd3="select * from events where organizer='$_SESSION[s_id]'";
        $result=mysql_query($sql_cmd3,$link) or die('An Error: '.mysql_error());
        if($result){
            return $result;
        }else{
            return "no";
        }
        mysql_close($link);
    }
    public function eventConvener($eventId){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd4="select * from events e,members m where e.organizer=m.id and e.id=$eventId";
        $result=mysql_query($sql_cmd4,$link) or die('An Error: '.mysql_error());
        if($result){
            $count=mysql_num_rows($result);
            if($count==1){
                return $result;
            }else{
                echo "Redundancy In Same Id....";
                //Do Nothing.....
            }
        }else{
            return "no";
        }
        mysql_close($link);
    }

    public function findEventRows($editId){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd5="select * from events where id=$editId";
        $result=mysql_query($sql_cmd5,$link) or die('An Error: '.mysql_error());
        if($result){
            $count=mysql_num_rows($result);
            if($count==1){
                return $result;
            }else{
                //Do Nothing.....
                echo "Redundancy In Same Id....";
            }
        }else{
            return "no";
        }
        mysql_close($link);
    }
    public function editDatabaseEvent($e_id,$e_title,$e_date,$e_desc){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd6="update events set title='$e_title',date='$e_date',description='$e_desc' where id=$e_id";
        $result=mysql_query($sql_cmd6,$link) or die('An Error: '.mysql_error());
        if($result){
            $count=mysql_affected_rows($result);
            if($count==1){
                return "yes";
            }
        }else{
            return "no";
        }
        mysql_close($link);
    }

    public function getLastEvent(){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd7="select * from events order by id desc limit 0,1";
        $output=mysql_query($sql_cmd7,$link) or die('An Error: '.mysql_error());
        if($output){
            return $output;
        }else{
            return "no";
        }
        mysql_close($link);
    }
    public function getMyEvents($myId){
        $db=Database::getInstance();
        $link=$db->getConnection();
        $sql_cmd8="select id from events where organizer=$myId";
        $output=mysql_query($sql_cmd8,$link) or die('An Error: '.mysql_error());
        if($output){
            $count=mysql_num_rows($output);
            return $count;
        }else{
            return "no";
        }
        mysql_close($link);
    }
} 