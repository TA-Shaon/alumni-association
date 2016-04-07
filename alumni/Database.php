<?php
/**
 * Created by PhpStorm.
 * User: Card
 * Date: 10/15/15
 * Time: 8:37 AM
 */

class Database {
    private $connection;
    protected static $instance;

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance= new self;
        }
        return self::$instance;
    }
    function __construct(){
        $this->connection=mysql_connect("localhost","root","");
        if(mysql_error()){
            trigger_error('There is problem in connecting with Database.'.mysql_error(),E_USER_ERROR);
        }else{
            mysql_select_db("alumni",$this->connection);
        }
    }
    public function getConnection(){
        return $this->connection;
    }
} 