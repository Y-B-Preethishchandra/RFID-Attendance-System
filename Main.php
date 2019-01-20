<!DOCTYPE html>
<?php
if(isset($_POST['add']))
	header("location:/MPCA/ADDSTUDENT/firstadd.php");
if(isset($_POST['mark']))
	header("location:/MPCA/MARKATTENDANCE/mark.php");
if(isset($_POST['get']))
	header("location:/MPCA/GETATTENDANCE/firstadd.php");




?>
<html>
<head>
<style type="text/css">
#r{
position:absolute;
top:90px;
left:0px;
margin:-1px;
}
.but
{
position:absolute;
top:0px;
left:0px;
background-color:rgba(247, 196, 43, 0.8);
border:0px;
border-radius:2px;
width:450px;
height:90px;
font-size:20px;
color:lightblack;
padding:10px;
}
#o{position:absolute;left:400px;}
#t{position:absolute;left:850px;}
#th{position:absolute;left:-20px;width:420px;}
</style>
</head>
<body>
<img id="r" class="r" src="s.jpg"/>

<form method="POST">
<input type="submit" value="Mark Attendance" name="mark"  class="but" id="t">
<input type="submit" value="Add Student" name="add" class="but" id="o">

<input type="submit" value="View Attendance" name="get"  class="but" id="th">


</form>

</body>
</html>
