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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query1 = "SELECT COUNT(*) FROM MPCA WHERE RFID='$uidstr' GROUP BY RFID;";
echo "<br>";
$query2 = "SELECT COUNT(*) FROM TOC WHERE RFID='$uidstr' GROUP BY RFID;";
echo "<br>";
$query3 = "SELECT COUNT(*) FROM DBMS WHERE RFID='$uidstr' GROUP BY RFID;";
echo "<br>";
$query4 = "SELECT COUNT(*) FROM LA WHERE RFID='$uidstr' GROUP BY RFID;";
echo "<br>";
$query5 = "SELECT COUNT(*) FROM DAA WHERE RFID='$uidstr' GROUP BY RFID;";
echo "<br>";
$result1 =mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);
print_r($row1);
$result2 =mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);
print_r($row2);
$result3 =mysqli_query($conn, $query3);
$row3 = mysqli_fetch_assoc($result3);
print_r($row3);
$result4 =mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($result4);
print_r($row4);
$result5 =mysqli_query($conn, $query5);
$row5 = mysqli_fetch_assoc($result5);
print_r($row5);
mysqli_close($conn);

$serial->deviceClose();
}
else{
	echo "<script>alert('RFID NOT FOUND')</script>";
	
	$serial->deviceClose();
	//header("Location: error.php");
}

}

?>

