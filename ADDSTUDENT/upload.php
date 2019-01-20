
<?php

session_start();

if((strlen($_POST['NAME'])!=0)&&(strlen($_POST['SECTION'])!=0)&&(strlen($_POST['SRN'])!=0))
{

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$name= $_POST["NAME"];
$srn= $_POST["SRN"];
$sec= $_POST["SECTION"];
$rfid=$_SESSION['RFID'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "INSERT INTO Student(RFID,SRN,NAME,SECTION,IMG) VALUES ('$rfid','$srn','$name','$sec','$target_file');";
echo "<script>alert('success');</script>";
mysqli_query($conn, $query);
mysqli_close($conn);
header("Location: firstadd.php");

}





?>
