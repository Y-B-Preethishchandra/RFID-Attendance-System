<?php


$comPort = "/dev/ttyACM0"; //The com port address. This is a debian address

$msg = '';
include 'php_serial.class.php';
if(isset($_POST["Recieve"]))
{
$flag=0;
$serial = new phpSerial;

$serial->deviceSet($comPort);

$serial->confBaudRate(9600);

$serial->confParity("none");

$serial->confCharacterLength(8);

$serial->confStopBits(1);

$serial->deviceOpen();

sleep(2); //Unfortunately this is nessesary, arduino requires a 2 second delay in order to receive the message

$read = $serial->readPort();
if((strlen($read)!=0))
{

session_start();
$uid=explode(" ",$read);
$uidno=array($uid[1],$uid[2],$uid[3],$uid[4]);
$uidstr=$uid[1].$uid[2].$uid[3].$uid[4];


$_SESSION['RFID']=$uidstr;

header("Location: add.php");
}

else{
	echo "<script>alert('RFID NOT FOUND');</script>";
	}

$serial->deviceClose();


}

?>

<html>

<head>

<title>Add Students To Database</title>
<style>
body 
{
background:url(f.jpg);
top:0px;
left:0px;
}
#scanner
{
background-color:rgba(68,57,27,0.6);
position:absolute;
width:23%;
height:58%;
top:20%;
left:38%;
}
.textb 
{
background-color:rgba(243, 218, 92, 0.4);
margin:0 auto;
margin-top:0px;
margin-left:0px;
border:0px;
border-radius:2px;
width:200px;
height:30px;}
p
{
color:white;
}
span
{
color:white;
}
#e
{
position:absolute;
top:520px;
left:1130px;
}

#f
{
position:absolute;
top:560px;
left:10px;
}

#button
{
background-color:rgba(247, 196, 43, 0.4);
border:0px;
border-radius:2px;
width:130px;
height:50px;
position:absolute;
left:75px;
top:150px;
font-size:18px;
}
#fr
{
font-size:25px;
color:Black;
position:absolute;
left:75px;
}
</style>
</head>
<body >
<img src="images.jpg" style=";width:9%;height:18%;" id="e"/>
<img src="pes.png" style=";width:20%;height:15%;" id="f"/>
<form  method="post" enctype="multipart/form-data" id='scanner'>
<span id='span'> <P id="fr">SCAN RFID<p></span><br><br><br><br>

<input type="submit" value="Scan" name="Recieve" id="button"><br>

</form><br>


<center>
</body>

</html>
