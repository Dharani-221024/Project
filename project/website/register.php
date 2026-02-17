<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <label>username:</label><br>
        <input type="text" name="name"><br>
        <label>ID:</label><br>
        <input type="text" name="id"><br>
        <label>password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="register" value="Register">

    </form>
</body>
</html>
<?php
if(isset($_POST["register"])){
$name=$_POST["name"];
$id=$_POST["id"];
$psw=$_POST["password"];
$db_name="testdb";
$db_server="localhost";
$db_user="root";
$db_pass="";
$conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if($conn){
    echo "connection success";
}
$sql="INSERT INTO students(id,name,password) VALUES($id,'$name','$psw')";
mysqli_query($conn,$sql);
mysqli_close($conn);
}
?>