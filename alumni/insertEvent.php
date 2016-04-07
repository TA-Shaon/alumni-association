<?php
session_start();
function __autoload($class){
    include_once $class.'.php';
}
if(isset($_SESSION['s_id'])&& isset($_SESSION['s_name']) && isset($_SESSION['s_email'])){
    if(isset($_POST)){
        if(isset($_POST['eventTitle']) && isset($_POST['eventDesc'])){
            $directory="Image";
            if(! empty($_FILES['cover'])){
                $file_name=$_FILES['cover']['name'];
                $file_path=$_FILES['cover']['tmp_name'];
                $file_type=$_FILES['cover']['type'];
                if($file_type=="image/jpg" ||$file_type=="image/jpeg" ||$file_type=="image/gif" ||$file_type=="image/png"){
                    if(copy($file_path,"$directory/$file_name")){
                        $event= new Events(array(
                          'title'=>$_POST['eventTitle'],
                          'date'=>$_POST['eventDate'],
                          'description'=>$_POST['eventDesc'],
                          'photo'=>"$directory/$file_name",
                        ));
                        $output= $event->insertEvent();
                        if($output=="yes"){
                            echo "Addition Is Successful.";
                        }else{
                            echo "Addition Is Unsuccessful.";
                        }
                    }else{
                        echo "Something Went Wrong. Try Again.";
                        echo"<a href='newEvent.php'></a>";
                    }
                }else{
                    echo "Insert a photo of jpeg, gif or png format.";
                    echo"<a href='newEvent.php'>Go Back</a>";
                }
            }else{
                $event= new Events(array(
                    'title'=>$_POST['eventTitle'],
                    'date'=>$_POST['eventDate'],
                    'description'=>$_POST['eventDesc'],
                    'photo'=>"$directory/cover.png",
                ));
                $output= $event->insertEvent();
                if($output=="yes"){
                    echo "Addition Is Successful.";
                }else{
                    echo "Addition Is Unsuccessful.";
                }
            }
        }else{
            echo "Please Fill all Required fields.";
            echo"<a href='newEvent.php'>Go Back</a>";
        }
    }
}else{
    echo "You Are Not Logged In. Please Login First. ";
    echo "<a href='index.php'> Go Back</a>";
}
