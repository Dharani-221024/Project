<?php
$y=10;//global variable
function locals(){
global $z;
global $y;
$x=1;//local variable
$z=9;
echo $x;
echo "global in fn $y here.<br>";
}
locals();
echo "<br>";
locals();
echo "the value of is $y<br>";
echo "the local as global $z<br>";
function statvar(){
static $count=0;//without static only one number repeatedly prints
echo $count."<br>";
$count++;
}
statvar();
statvar();
statvar();
statvar();
//string functions
$usename="Dharani is a brilliant student";
echo "<br><br><b>String Functions Testing:</b><br>";
echo "Original: $usename<br>";

echo "Upper case: " . strtoupper($usename) . "<br>";
echo "Character Count: " . strlen($usename) . "<br>";
echo "Reversed String: " . strrev($usename) . "<br>";

$usename = strtolower($usename);
echo "Lower case: " . $usename . "<br>";

echo "Compare with hello: " . strcmp($usename,"hello") . "<br>";
echo "Position of 'brilliant': " . strpos($usename,"brilliant") . "<br>";

$part1 = substr($usename,0,7); 
echo "First 7 characters (Substring): " . $part1 . "<br>";

echo "<br>Exploding string into words:<br>";
$explode = explode(" ", $usename);
foreach($explode as $ex){
    echo $ex . "<br>";
}

echo "<br>Imploding words back into a string:<br>";
$implodeArray = array("Dharani","loves","to","code");
echo implode(" ", $implodeArray) . "<br>";
?>
