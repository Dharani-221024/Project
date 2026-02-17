<?php
echo "dharani <br>";
//comment
/*multi
 line 
 comments
 */
$x=2;
$y=4;
$name='dharani <br>';
echo $name;
echo "my name is {$name}";
$for_sale=true;
$online=false;
echo "online: {$online} <br>";
echo "sale: {$for_sale} <br>";
$total=$x*$y;
echo "\${$total} <br>";
$x++; 
echo $x;
$y--; 
echo $y;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label>username:</label><br>
        <input type="text" name="username"><br>
        <label>password:</label><br>
        <input type="password" name="password"><br>
        <label>quantity:</label><br>
        <input type="text" name="quantity"><br>
        <label>Radius</label>
        <input type="text" name="radius"><br>
        <input type="submit" name="log in" value="log in">

    </form>
</body>
</html>
<?php
/*
echo "hello {$_POST["username"]}!<br>";
echo "your password is {$_POST["password"]}!<br>";
$q=$_POST["quantity"];
echo $q;
$radius=$_POST["radius"];
$circum=null;
$circum=2*pi()*$radius;
$circum=round($circum,2);
echo "circumference={$circum}cm <br>";
*/

//if statements
$age=18;
if($age>18){
    echo "ok good proceed";
}
elseif($age==18){
    echo"not enough <br>";
}
else{
    echo"not possible <br>";
}
$z=null;
if(isset($z)){
    echo "set <br>";
}
else{
    echo "not set <br>";
}
$z=true;
if(empty($z)){
    echo "empty <br>";
}
else{
    echo "not empty <br>";
}
foreach($_POST as $key =>$value){
    echo"{$key}={$value} <br>";
}
if(isset($_POST["log in"])){
    echo "you logged in";
}else{
    echo "login";
}
function hbd($uname){
    echo "hbd {$uname}<br>";
}
hbd("dharani");
$username="dharani";
$username=strtoupper($username);
?>