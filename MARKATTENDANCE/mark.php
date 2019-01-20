<!DOCTYPE html>
<?php
if(isset($_POST['submit']))
{
	$fp=fopen("classdetails.txt","w") or die("Unable to open file");
	fwrite($fp,$_POST['sublist']."\n");
	fwrite($fp,$_POST['date']."\n");
	if(isset($_POST['single']))
	{	fwrite($fp,$_POST['single']."\n");}
	else{
	fwrite($fp,$_POST['sublist']."\n");
	}
	fwrite($fp,$_POST['classno']);
	fclose($fp);
	header("location:firstadd.php");
}
?>
<html>

<head>

<title></title>
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
height:60%;
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
.button
{
background-color:rgba(247, 196, 43, 0.4);
border:0px;
border-radius:2px;
width:130px;
height:50px;
position:absolute;
left:80px;
top:300px;
font-size:18px;
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
#s{
background-color:rgba(243, 218, 92, 0.4);

}
#button
{
background-color:rgba(247, 196, 43, 0.4);
border:0px;
border-radius:2px;
width:90px;
height:30px;
}

.sel {
position:absolute;
top:50px;
left:20px;
background-color:rgba(243, 218, 92, 0.4);
   height: 29px;
   overflow: hidden;
   width: 240px;
   margin:-1px;
   border:0px;
   
}
. sel {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
   padding: 5px; 
   width: 268px;
}

.sel.slate {
  
   height: 34px;
   width: 240px;
}

. sel {

   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}
#fr
{
font-size:25px;
color:Black;
position:absolute;
left:100px;
top:-10px;
}
#fe
{
font-size:25px;
color:Black;
position:absolute;
left:115px;
top:58px;
}
#dat
{
position:absolute;
left:20px;
top:115px;
width:240px;
}
.s
{
font-size:20px;
color:black;
position:absolute;
top:160px;
left:80px;

}
#d{
position:absolute;
left:20px;
top:250px;
width:240px;}
#fff
{
font-size:22px;
color:Black;
position:absolute;
left:80px;
top:193px;
}
</style>
</head>
<body >
<img src="images.jpg" style=";width:9%;height:18%;" id="e"/>
<img src="pes.png" style=";width:20%;height:15%;" id="f"/>
<form  method="post"  enctype="multipart/form-data" id='scanner'>
<span><p id="fr">Subject<p></span><br>
<select name="sublist" class="sel" >
  <option value="MPCA">MPCA</option>
  <option value="LA">LA</option>
  <option value="TOC">TOC</option>
  <option value="DBMS">DBMS</option>
  <option value="DAA">DAA</option>
</select><br>
<p id="fe">Date<p>
<input type="date" name="date" class="textb" id="dat"><br>
<div class="s"><input type="radio" name="single" value="Single" checked class="r" id="s"> Single class<br>
<input type="radio" name="single" value="Block" class="r" id="b"> Block Hour<br></div>
<span><p id="fff">Class Number</p></span><br>
<input type='text' name='classno' class="textb" id="d"><br>
<input type="submit"name='submit' class="button">
</form><br>



</body>

</html>
