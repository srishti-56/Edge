<?php
session_start();
?>
<html>
<head>
	<title> Edge </title>
	<link rel='stylesheet' href='http://localhost/Wt/css/style.css'/>
	
  </head>

  <body>

 <div id="header" style="background-color:#19334d" >
  <a href="http://localhost/index.php"><img src="Wt/img/edge.jpg" align="middle" style="margin-left:30%;"></a>
</div>
<div style="background-image:url(Wt/img/glow1.jpg); background-repeat:no-repeat;
    background-size:cover; height:100%" >

<nav>
  <ul id="ul">
    <li id="li">
      <a id="lia" href="Wt/learn.php"> <span>Learn</a> </span> </li>

    <li id="li" class="dropdown" "style="padding-left:10px"><a href="#"> Gates</a>
 	<div class="dropdown-content">
    <a href="Wt/AND.php">AND Gate</a>
    <a href="Wt/OR.php">OR Gate</a>
    <a href="Wt/NOT.php">NOT Gate</a>
 	<a href="Wt/NAND.php">NAND Gate</a>
    <a href="Wt/NOR.php">NOR Gate</a>
    <a href="Wt/XOR.php">XOR Gate</a>
	<a href="Wt/XNOR.php">XNOR Gate</a>
 	</div>
	</li>

    <li id="li"><a id="lia" href="Wt/shop.php">Shop</a></li>
    <li id="li"><a id="lia" href="Wt/test.php">Test</a></li>
    <!-- <li id="li" style="padding-left:10px"><a id="lia" href="Wt/about.html">About us</a></li> -->

    <?php if(!isset($_SESSION['logged_user'])){
    echo '<li id="signin" style="float:right; padding-right: 10px;"><a href="Wt/login.html"> Log in </a> </li>
    <li id="signin" style="float:right; padding-right: 10px;"><a href="Wt/register.html"> Register </a> </li> ' ;
    }
    ?>

     <li id="userinfo" style=" padding-top: 10px;float:right"> <span><?php if(isset($_SESSION['logged_user'])) echo '<p style="padding-right:20px; display:inline; color:white; font-weight:800"> ' . 'Welcome ' . $_SESSION['logged_user'] ; ?> </p></span>
     </li>

     <?php if(isset($_SESSION['logged_user'])){
      echo '<li id="signout" style="float:right; padding-right: 10px;"><a href="Wt/logout.php"> Logout </a> </li> ' ;
  }
  ?>
</nav>
  
<!--  if(isset($_SESSION['logged_user']))
        set display of register/ login to none
-->


<!--NAV ends -->

<div class="container">
  <div class="column" style="display:inline-block"> <a href="Wt/learn.php"/> <h3 style="color:#f1592a"> Learn </h3> <p>Try out our simulator </p> <p> Play while you learn! </p> </div>
  <div class="column" style="display: inline-block;"> <a href="Wt/test.php"/><h3 style="color:#0f7a25"> Test </h3><p> Quiz yourself and see how much you know </p> <img src =><p> Check your scores on our leaderboards to get your rank! </p> </div>
  <div class="column" style="display:inline-block"> <a href="Wt/shop.php"><h3> Shop </h3> <p> Find tons of boards and circuits for your experiments </p>
  </div>
</div>
  
</div>


</body>
</html>