<?php
 $db_server="localhost";
 $db_user="root";
 $db_pass="";
 $db_name="testdb";
 $conn="";
 try{
 $conn=mysqli_connect($db_server,
                      $db_user,
                      $db_pass,
                      $db_name);
 }
 catch(mysqli_sql_exception){
    echo"some error in connecting";
 }
if($conn){
    echo"connected successfully";
}else{
    echo"no connection";
}
$name="dharani";
$psw="swqq";
$sql="INSERT INTO students(id,name,password) VALUES(1023,'$name','$psw')";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>