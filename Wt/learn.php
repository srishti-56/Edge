<?php session_start(); ?>
<html>
<head>

	<title> Circuit simulator </title>


    <link rel='stylesheet' href='http://localhost/Wt/css/style.css'/>
    
</head>


<body style="background-color: #91c0d8">
<div id="header" style="background-color:#19334d" >
  <a href="http://localhost/index.php"><img src="http://localhost/Wt/img/edge.jpg" align="middle" style="margin-left:30%;"></a>
</div>
<div style="background-image:url(img/back3.jpg); background-repeat:no-repeat;
    background-size:cover; height:100%">

<nav>
  <ul id="ul">
    <li id="li">
      <a id="lia" href="learn.php"> <span>Learn</a> </span> </li>

    <li id="li" class="dropdown" "style="padding-left:10px"><a href="#"> Gates</a>
    <div class="dropdown-content" style="z-index:20">
    <a href="AND.php">AND Gate</a>
    <a href="OR.php">OR Gate</a>
    <a href="NOT.php">NOT Gate</a>
    <a href="NAND.php">NAND Gate</a>
    <a href="NOR.php">NOR Gate</a>
    <a href="XOR.php">XOR Gate</a>
    <a href="XNOR.php">XNOR Gate</a>
    </div>
    </li>

    <li id="li"><a id="lia" href="shop.php">Shop</a></li>
    <li id="li"><a id="lia" href="test.php">Test</a></li>
     <!-- <li id="li" style="padding-left:10px"><a id="lia" href="about.html">About us</a></li> -->

     <?php if(!isset($_SESSION['logged_user'])){
    echo '<li id="signin" style="float:right; padding-right: 10px;"><a href="login.html"> Log in </a> </li>
    <li id="signin" style="float:right; padding-right: 10px;"><a href="register.html"> Register </a> </li> ' ;
    }
    ?>

     <li id="userinfo" style=" padding-top: 10px;float:right"> <span><?php if(isset($_SESSION['logged_user'])) echo '<p style="padding-right:20px; display:inline; color:white; font-weight:800"> ' . 'Welcome ' . $_SESSION['logged_user'] ; ?> </p></span>
     </li>

     <?php if(isset($_SESSION['logged_user'])){
      echo '<li id="signout" style="float:right; padding-right: 10px;"><a href="logout.php"> Logout </a> </li> ' ;
  }
  ?>
      

</nav>
<img id="zero" src="img/zero.jpg" height=0/>
<img id="one" src="img/one.jpg" width=0/>
<img id="AND" src="img/andgate.jpg" height=0/>
<img id="OR" src="img/orgate.jpg" width=0/>
<img id="NAND" src="img/nandgate.jpg" width=0/>
<img id="NOR" src="img/norgate.jpg" width=0/>
<img id="XOR" src="img/xorgate.jpg" width=0/>
<img id="XNOR" src="img/xnorgate.jpg" width=0/>
<div style="background-color:white;border:solid 1px;padding:10px">
<p><b>This tool allows you to calculate the output of two inputs from a logic gate. You may perform two operations using a variety of gates and use those two outputs for a third final operation. The inputs and gate choices are common to both the first and second operation. The final operation uses only the choice of gate.Not providing first and second stage operations will result in the third gate taking  inputs as 0</b></p>
</div>
<canvas id="myCanvas" width="1000" height="500" style="background-color:white;float:left;border: solid #d3d3d3;margin:20px;">
Your browser does not support the HTML5 canvas tag.
</canvas>
<div style="padding:10px;background-color:white;margin-top:100px;margin-left:1035;float:top;border:solid 1px;">
</br>
<label>Choose your gate</label>
<select id="gate" style="float:right;width:150px">
<option>AND</option>
<option>OR</option>
<option>XOR</option>
<option>XNOR</option>
<option>NOR</option>
<option>NAND</OPTION>
</select>
</br>

</br></br>
<label >Enter inputs</label>
<select id="b" style="float:right;width:50px">
<option>0</option>
<option>1</option>
</select>

<select id="a" style="float:right;width:50px">
<option>0</option>
<option>1</option>
</select>
</br>
</br>
<br>GO stage 1
<input type="submit" value="GO" onclick="go()"></br>
<br>GO stage 2
<input type="submit" value="GO next " onclick="go2()"></br>
<br>GO final stage
<input type="submit" value="GO final " onclick="go3()"></br>
</div>
<script>
   var sum=0;
 var s1=0;
 var s2=0;
 var s3=0;

   function imagea() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    if(a==0)
    var img = document.getElementById("zero");
       else
              var img = document.getElementById("one");
    ctx.drawImage(img, 10, 40,60,60);
}

 function imageb() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
     if(b==0)
    var img = document.getElementById("zero");
     else
           var img = document.getElementById("one");
    ctx.drawImage(img, 10,110,60,60);
}

function imagegate(x) {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");

    var img = document.getElementById(x);
        
    ctx.drawImage(img,80,10,200,200);
 /*   ctx.beginPath();
ctx.moveTo(50,50)
ctx.lineTo(300,150);
ctx.stroke();
ctx.beginPath();
ctx.moveTo(50,200);
ctx.lineTo(300,150);
ctx.stroke();*/
}


function go(){
sum=0;
a=document.getElementById("a").value;
b=document.getElementById("b").value;
gate=document.getElementById("gate").value;
imagea();
imageb();
imagegate(gate);
if(gate=="AND")
ADD();
else if(gate=="OR")
OR();
else if(gate=="NOR")
NOR();
else if(gate=="NAND")
NAND();
else if(gate=="XOR")
XOR();
else if(gate=="XNOR")
XNOR();

s1=sum;
imagesum(sum);
}

function imagesum(x) {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    if(x==0)
    var img = document.getElementById("zero");
       else
              var img = document.getElementById("one");
    ctx.drawImage(img, 290,60,100,100);
}

function go2(){
sum=0;
a=document.getElementById("a").value;
b=document.getElementById("b").value;
gate=document.getElementById("gate").value;
imagea2();
imageb2();
imagegate2(gate);
if(gate=="AND")
ADD();
else if(gate=="OR")
OR();
else if(gate=="NOR")
NOR();
else if(gate=="NAND")
NAND();
else if(gate=="XOR")
XOR();
else if(gate=="XNOR")
XNOR();
imagesum2(sum);
s2=sum;
}


function go3(){
sum=0;
a=s1;
b=s2;
gate=document.getElementById("gate").value;

imagegate3(gate);
if(gate=="AND")
ADD();
else if(gate=="OR")
OR();
else if(gate=="NOR")
NOR();
else if(gate=="NAND")
NAND();
else if(gate=="XOR")
XOR();
else if(gate=="XNOR")
XNOR();
imagesum3(sum);
}


function ADD()
{
 sum=a&b;
}
function OR()
{
 sum=a|b;
}
function NAND()
{
 sum=!(a&b);
}
function NOR()
{
  sum=!(a|b);
}
function XOR()
{
  sum=!(a&b)||(a&!b);
}
function XNOR()
{
 sum=!(!(a&b)||(a&!b));
}

 function imagea2() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    if(a==0)
    var img = document.getElementById("zero");
       else
              var img = document.getElementById("one");
    ctx.drawImage(img, 10, 270,60,60);
}

 function imageb2() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
     if(b==0)
    var img = document.getElementById("zero");
     else
           var img = document.getElementById("one");
    ctx.drawImage(img, 10,340,60,60);
}

function imagegate2(x) {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");

    var img = document.getElementById(x);
        
    ctx.drawImage(img,80,250,200,200);
 /*   ctx.beginPath();
ctx.moveTo(50,50)
ctx.lineTo(300,150);
ctx.stroke();
ctx.beginPath();
ctx.moveTo(50,200);
ctx.lineTo(300,150);
ctx.stroke();*/
}


function imagegate3(x) {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");

    var img = document.getElementById(x);
        
    ctx.drawImage(img,600,150,200,200);
 ctx.beginPath();
ctx.moveTo(400,100)
ctx.lineTo(500,100);
ctx.stroke();
 ctx.beginPath();
ctx.moveTo(500,100)
ctx.lineTo(500,200);
ctx.stroke();
ctx.beginPath();
ctx.moveTo(500,200);
ctx.lineTo(600,200);
ctx.stroke(); 

 ctx.beginPath();
ctx.moveTo(400,360)
ctx.lineTo(500,360);
ctx.stroke();
 ctx.beginPath();
ctx.moveTo(500,360)
ctx.lineTo(500,300);
ctx.stroke();
ctx.beginPath();
ctx.moveTo(500,300);
ctx.lineTo(600,300);
ctx.stroke(); 

}

function imagesum2(x) {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    if(x==0)
    var img = document.getElementById("zero");
       else
              var img = document.getElementById("one");
    ctx.drawImage(img, 290,300,100,100);
}

function imagesum3(x) {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    if(x==0)
    var img = document.getElementById("zero");
       else
              var img = document.getElementById("one");
    ctx.drawImage(img,800,200,100,100);
}
</script>


</body>
</html>