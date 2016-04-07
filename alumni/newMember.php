<?php
include_once 'header.php';
echo "<div class='content'>";
function __autoload($class_name){
    include_once $class_name.'.php';
}

if(isset($_POST['member_name']) && isset($_POST['member_email']) && isset($_POST['member_roll']) && isset($_POST['member_batch']) && isset($_POST['member_blood']) && isset($_POST['member_phone']) && isset($_POST['member_password'])){

    if(! empty($_FILES['photo']['name'])){
        $directory="Image";
        $file_name=$_FILES['photo']['name'];
        $file_path=$_FILES['photo']['tmp_name'];
        $file_type=$_FILES['photo']['type'];
        if($file_type=="image/jpeg" || $file_type="image/png" || $file_type="image/gif"){
            if(copy($file_path,"$directory/$file_name")){
                $newMember= new AlumniMembers(array(
                    'mem_name'=>$_POST['member_name'],
                    'mem_roll'=>$_POST['member_roll'],
                    'mem_batch'=>$_POST['member_batch'],
                    'mem_birth'=>$_POST['member_birth'],
                    'mem_blood'=>$_POST['member_blood'],
                    'mem_cu_address'=>$_POST['member_current_address'],
                    'mem_per_address'=>$_POST['member_permanent_address'],
                    'mem_photo'=>"$directory/$file_name",
                    'mem_work'=>$_POST['member_work'],
                    'mem_com_name'=>$_POST['member_company'],
                    'mem_com_address'=>$_POST['member_company_address'],
                    'mem_email'=>$_POST['member_email'],
                    'mem_password'=>$_POST['member_password'],
                    'mem_fb_pro'=>$_POST['member_fb'],
                    'mem_phone'=>$_POST['member_phone'],
                ));
                $insert=$newMember->insertMember();
                if($insert=="yes"){
                    echo"<div style='text-align: center; font-size: 25px; color: lightseagreen; padding-top: 150px;'>";
                        echo "Congratulation ".$_POST['member_name'].". Your Registration Is Successful.";
                    echo "</div>";
                }else{
                    echo "We are Sorry  ".$_POST['member_name'].". Your Registration Is Not Successful. Try Again.";
                }
            }else{
                echo "An Error Occurred. Try again.";
            }
        }else{
            echo "Please insert a Picture (jpeg/png/gif). Try again.";
        }
    }else{
        $directory="Image";
        $newMember= new AlumniMembers(array(
            'mem_name'=>$_POST['member_name'],
            'mem_roll'=>$_POST['member_roll'],
            'mem_batch'=>$_POST['member_batch'],
            'mem_birth'=>$_POST['member_birth'],
            'mem_blood'=>$_POST['member_blood'],
            'mem_cu_address'=>$_POST['member_current_address'],
            'mem_per_address'=>$_POST['member_permanent_address'],
            'mem_photo'=>"$directory/default_0xt5.jpg",
            'mem_work'=>$_POST['member_work'],
            'mem_com_name'=>$_POST['member_company'],
            'mem_com_address'=>$_POST['member_company_address'],
            'mem_email'=>$_POST['member_email'],
            'mem_password'=>$_POST['member_password'],
            'mem_fb_pro'=>$_POST['member_fb'],
            'mem_phone'=>$_POST['member_phone'],
        ));
        $insert=$newMember->insertMember();
        if($insert=="yes"){
            echo"<div style='text-align: center; font-size: 25px; color: lightseagreen;padding-top: 150px;'>";
                echo "Congratulation ".$_POST['member_name'].". Your Registration Is Successful.";
            echo "</div>";
        }else{
            echo "We are Sorry ".$_POST['member_name'].". Your Registration Is Not Successful. Try Again.";
            echo "<a href='registration.php' ></a>";
        }
    }
}else{

    echo "Please Select Required Fields. Try again.";
    echo "<a href='registration.php' ></a>";
}
echo "</div>";
include_once 'footer.php';

