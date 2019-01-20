<!DOCTYPE html>



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
width:25%;
height:62%;
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
width:90px;
height:30px;
}
#button
{
background-color:rgba(247, 196, 43, 0.4);
border:0px;
border-radius:2px;
font-size:18px;
width:150px;
}
</style>
</head>
<body >
<img src="images.jpg" style=";width:9%;height:18%;" id="e"/>
<img src="pes.png" style=";width:20%;height:15%;" id="f"/>
<center>
<form action="upload.php" method="post" enctype="multipart/form-data"id='scanner'>

<p>NAME</p>
<input type='text'  value="" name="NAME" class="textb"><br>
<p>SRN</p>
<input type='text'  value="" name="SRN" class="textb"><br>
<p>SECTION</p>
<input type='text'  value="" name="SECTION" class="textb" ><br><br><br>
<span> IMAGE</span>
<input type="file" name="fileToUpload" id="fileToUpload" class="textb"><br><br>
<input type='submit'id="button">
<br>

</form><br>


<center>
</body>

</html>
