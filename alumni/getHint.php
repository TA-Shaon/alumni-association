<?php
function __autoload($class){
    include_once $class.'.php';
}
$string=$_REQUEST['str'];

if($string!=""){
    $hints="";
    $hint= new AlumniMembers();
    $value= $hint->getSuggestion($string);
    //echo $string;
    if($value=="no"){

    }else{
        while($row=mysql_fetch_array($value)){
            if($hints==""){
                $hints=$row['name'];
            }else{
                $hints.=", $row[name]";
            }
        }
    }
    echo $hints==""? "No suggestion." : $hints;
}
