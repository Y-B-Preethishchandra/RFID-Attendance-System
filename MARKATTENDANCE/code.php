<?php


$comPort = "/dev/ttyACM0"; //The com port address. This is a debian address
$msg = '';
include 'php_serial.class.php';
if(isset($_POST["Recieve"])){
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
//print_r($read); 
if((strlen($read)!=0))
{
$uid=explode(" ",$read);
$uidno=array($uid[1],$uid[2],$uid[3],$uid[4]);
$uidstr=$uid[1].$uid[2].$uid[3].$uid[4];

$fp=fopen("classdetails.txt","r") or die ("Unable to open file");
$subject=fgets($fp);
$date=explode("-",fgets($fp));
$date1=$date[0]."/".$date[1]."/".$date[2];
$classtype=fgets($fp);
$classno=(int)fgets($fp);
echo $classno;
//echo $uidstr;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo $subject;
$query = "INSERT INTO ".$subject." (RFID,DATE,CLASS) VALUES ('$uidstr','$date1','$classno');";
//echo $query;
mysqli_query($conn, $query);
if(strcmp($classtype,"Block")){
	$classno=$classno+1;
	//echo $classno;
	$query = "INSERT INTO ".$subject." (RFID,DATE,CLASS) VALUES ('$uidstr','$date1','$classno');";
	mysqli_query($conn, $query);
}
echo "<script>alert('success');</script>";

mysqli_close($conn);




$serial->deviceClose();
echo "<script>alert('Marked')</script>";
sleep(5);
header("Location: firstadd.php");

}
else{
	echo "<script>alert('RFID NOT FOUND')</script>";
	
	$serial->deviceClose();
	//header("Location: error.php");
}

}

?>

