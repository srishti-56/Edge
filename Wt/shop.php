<?php
session_start();
?>
<html>
<head>

 
    <link rel='stylesheet' href='http://localhost/Wt/css/style.css'/>

<style>
     #items{padding-left:10px;
       padding-top:10px;
       padding-right:10px;
         }
#item { -webkit-transition: all .2s ease-in-out;
display:block; 
position:relative;
margin:20px}
#item:hover { -webkit-transform: scale(1.2); }


</style>

<script>
  function a(x)
{x.style.backgroundColor="grey";
 
}
 function b(x)
{ x.style.backgroundColor="white";
}
 </script>  
   
  </head>

  <body>

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
    <!-- <li id="li" style="padding-left:10px"><a id="lia" href="Wt/about.html">About us</a></li>-->

    <?php if(!isset($_SESSION['logged_user'])){
    echo '<li id="signin" style="float:right; padding-right: 10px;"><a href="/Wt/login.html"> Log in </a> </li>
    <li id="signin" style="float:right; padding-right: 10px;"><a href="/Wt/register.html"> Register </a> </li> ' ;
    }
    ?>

     <li id="userinfo" style="float:right"> <span><p style="padding-right:10px; display:inline"> <?php if(isset($_SESSION['logged_user'])) echo 'Welcome ' . $_SESSION['logged_user'] ; ?> </p></span>
     </li>
     
    <?php if(isset($_SESSION['logged_user'])){
      echo '<li id="signout" style="float:right; padding-right: 10px;"><a href="logout.php"> Logout </a> </li> ' ;
  }
  ?>

</nav>

<div style="margin-top:70px">
<div id="item" onmouseover="a(this)" onmouseout="b(this)" style="float:left"><a href="http://www.amazon.in/7408-gate-IC-2-pieces/dp/B01ISXYJWK"/>
<img id="items" src="img/andbuy.jpg" height="200" width="200">
<center>AND gate</center>
<center>Rs 150</center>
</div>

<div id="item" onmouseover="a(this)" onmouseout="b(this)" style="float:left" text-align="center"> <a href="http://www.amazon.in/7432-gate-IC-2-Pieces/dp/B01ISYKNVK/"/>
<img id="items" src="img/orbuy.jpg" height="200" width="200">
<center>OR gate
</br>Rs 200</center>
</div>



<div id="item" onmouseover="a(this)" onmouseout="b(this)" style="float:left"> <a href="http://www.amazon.in/7402-NOR-gate-IC-Pcs/dp/B01ISXJWSG/"/>
<img id="items" src="img/norbuy.jpg" height="200" width="200">
<center>NOR gate</br>Rs 150</center>
</div>

<div id="item" onmouseover="a(this)" onmouseout="b(this)" style="float:left"> <a href="http://www.amazon.in/7400-Quad-NAND-Gate-IC/dp/B01IT7NJ80/"/>
<img id="items" src="img/nandbuy.jpg" height="200" width="200">
<center>NAND gate</br>Rs 150</center>
</div>


<div id="item" onmouseover="a(this)" onmouseout="b(this)" style="float:left">
<img id="items" src="img/xorbuy.jpg" height="200" width="200">
<center>XNOR gate</br>Rs 150</center>
</div>

<!-- <div onmouseover="a(this)" onmouseout="b(this)" style="float:left">
<img id="items" src="img/harambe.jpg" height="200" width="200">
<center>Harambe6</br>Rs 150</center>
</div>

<div onmouseover="a(this)" onmouseout="b(this)" style="float:left">
<img id="items" src="img/harambe.jpg" height="200" width="200">
<center>Harambe6</br>Rs 150</center>
</div>
-->
</div>


</body>
</html>
