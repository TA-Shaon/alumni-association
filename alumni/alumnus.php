<?php
function __autoload($class){
    include_once $class.'.php';
}
include_once 'header.php';
?>
<div class="content" style="padding-top: 30px;">
    <?php
    if($_POST){
        $error=0;
        if(!isset($_POST['batch'])){$error++;}
        if(!isset($_POST['name'])){$error++;}
        if(!isset($_POST['roll'])){$error++;}
        if($error>=3){
            echo "<script>";
            echo "alter('You have not choose any option.');";
            echo "</script>";
        }else{
            $searchStudent= new AlumniMembers();
            $wantedStu=$searchStudent->findStudent($_POST['batch'],$_POST['name'],$_POST['roll']);
            if($wantedStu=="no"){
                echo "<div style='text-align: center;padding: 30px;border:1px solid black;width: 700px;margin-left: 300px;font-size: 22px;'>";
                    echo "Something Is Wrong. Try again";
                echo "</div>";
            }else{
                $count=mysql_num_rows($wantedStu);
                if($count>=1){
                    echo "<table border='0' style='margin-left: 200px;text-align: center;'>";
                        echo "<th style='min-width: 200px;background-color: lightseagreen;padding: 10px;'>Name</th>";
                        echo "<th style='min-width: 200px;background-color: lightseagreen;padding: 10px;'>Roll</th>";
                        echo "<th style='min-width: 200px;background-color: lightseagreen;padding: 10px;'>Batch</th>";
                        echo "<th style='min-width: 200px;background-color: lightseagreen;padding: 10px;'>View</th>";
                        while($row=mysql_fetch_array($wantedStu)){
                            echo "<tr >";
                                echo "<td style='padding: 10px;background:#ededed;'>".$row['name']."</td>";
                                echo "<td style='padding: 10px;background:#ededed;'>".$row['roll']."</td>";
                                echo "<td style='padding: 10px;background:#ededed;'>".$row['batch']."</td>";
                                echo "<td style='padding: 10px;background:#ededed;'><a href='showDetail.php?id=$row[id]'>view</a></td>";
                            echo "</tr>";
                        }
                    echo "</table>";
                }else{
                    echo "<div style='text-align: center;padding: 30px;border:1px solid black;width: 700px;margin-left: 300px;font-size: 22px;'>";
                    echo "Sorry No Match";
                    echo "</div>";
                }
            }
        }
    }else{
    ?>
    <script>
        function getSuggestion(string){
            if(string.length=0){
                document.getElementById("suggestion").innerHTML = "";
                return;
            }else{
                var xhttp;
                if(window.XMLHttpRequest){
                    xhttp= new XMLHttpRequest();
                }else{
                    xhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xhttp.onreadystatechange= function(){
                    if(xhttp.readyState==4 && xhttp.status==200){
                        document.getElementById("suggestion").innerHTML=xhttp.responseText;
                    }
                };
                xhttp.open("GET", "getHint.php?str="+string, true);
                xhttp.send();
            }
        }
    </script>
    <div class="Search_box" style="width: 550px; margin: auto;border: 1px solid gray;padding-top: 30px;">
        <form method="post" action="alumnus.php" style="padding-left:115px;">
            <table>
                <tr>
                    <td>Batch:</td>
                    <td><select name="batch" style="width:220px;height:30px;">
                            <option value="CSE 2008-09">CSE 2008-09</option>
                            <option value="CSE 2009-10">CSE 2009-10</option>
                            <option value="CSE 2010-11">CSE 2010-11</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" onkeyup="getSuggestion(this.value)" style="width:220px;height:30px;"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><span id="suggestion"></span></td>
                </tr>
                <tr>
                    <td>Roll No:</td>
                    <td><input type="number" name="roll" style="width:220px;height:30px;"/></td>
                </tr>
                <tr><td></td><td><input type="submit" value="Search" id="submit_button"/></td></tr>
            </table>
        </form>
    </div>
    <div class="result_box">

    </div>

    <?php
    }
    ?>
</div>
<?php
include_once 'footer.php';
?>
