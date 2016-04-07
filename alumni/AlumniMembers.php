<?php
class AlumniMembers {
    public $mem_name;
    public $mem_roll;
    public $mem_batch;
    public $mem_birth;
    public $mem_blood;
    public $mem_cu_address;
    public $mem_per_address;
    public $mem_work;
    public $mem_com_name;
    public $mem_com_address;
    public $mem_email;
    public $mem_fb_pro;
    public $mem_phone;
    public $mem_photo;
    private $mem_password;

    function __construct($data=array()){
        if(!is_array($data)){
            echo "Something Is Wrong. Register Again please.";
        }
        if(count($data)>0){
            foreach($data as $var_name=>$values){
                $this->$var_name=$values;
            }
        }
    }

    public function insertMember(){
        $db=Database::getInstance();
        $link=$db->getConnection();

        $sql_cmd="insert into members (name,roll,batch,dob,blood,cu_address,per_address,profession,com_name,com_address,email,fb_pro,phone,photo,password) values('$this->mem_name','$this->mem_roll','$this->mem_batch','$this->mem_birth','$this->mem_blood','$this->mem_cu_address','$this->mem_per_address','$this->mem_work','$this->mem_com_name','$this->mem_com_address','$this->mem_email','$this->mem_fb_pro','$this->mem_phone','$this->mem_photo','$this->mem_password')";
        $result=mysql_query($sql_cmd,$link);
        if($result){
            return "yes";
        }else{
            return "No";
        }
        mysql_close($link);
    }

    public function findStudent($sBatch,$sName,$sRoll){
        $db=Database::getInstance();
        $link=$db->getConnection();

        if(isset($sBatch) && empty($sName) && empty($sRoll)){                                   //100--4
            $sql_cmd2="select * from members where batch='$sBatch'";
        }elseif(empty($sBatch) && isset($sName) && empty($sRoll)){                                  //010--2
            $sql_cmd2="select * from members where name like '%$sName%'";
        }elseif(empty($sBatch) && empty($sName) && isset($sRoll)){                                      //001--1
            $sql_cmd2="select * from members where roll=$sRoll";
        }elseif(empty($sBatch) && isset($sName) && isset($sRoll)){                                          //011--3
            $sql_cmd2="select * from members where name like '%$sName%' and roll=$sRoll";
        }elseif(isset($sBatch) && empty($sName) && isset($sRoll)){                                              //101--5
            $sql_cmd2="select * from members where batch='$sBatch' and roll=$sRoll";
        }elseif(isset($sBatch) && isset($sName) && empty($sRoll)){                                                  //110--6
            $sql_cmd2="select * from members where name like '%$sName%' and batch='$sBatch'";
        }elseif(isset($sBatch) && isset($sName) && isset($sRoll)){                                                      //111--7
            $sql_cmd2="select * from members where name like '%$sName%' and roll=$sRoll and batch='$sBatch'";
        }else{
            echo "Please Select One option";
        }
        $output=mysql_query($sql_cmd2,$link);
        if($output){
            return $output;
        }else{
            return "no";
        }
    }

    public function getMemberInfo($memId){
        $db=Database::getInstance();
        $link=$db->getConnection();

        $sql_cmd3="select * from members where id=$memId";
        $result=mysql_query($sql_cmd3,$link);
        if($result){
            return $result;
        }else{
            return "No";
        }
        mysql_close($link);
    }

    public function getSuggestion($str){
        $db=Database::getInstance();
        $link=$db->getConnection();
        //echo $str;
        $sql_cmd="SELECT name FROM members WHERE name LIKE  '%$str%' LIMIT 0 , 4";
        $result=mysql_query($sql_cmd,$link);
        if($result){
            return $result;
        }else{
            return "No";
        }
        mysql_close($link);
    }
}