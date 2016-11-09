<?php
session_start();
?>
<html>
<head>
<style>
button, #isubmit {
    border-radius: 4px;
  border: 1px solid rgba(0, 0, 0, 0.2);margin-left:10px; height:40px; width:70px;box-shadow: 0 2px 6px -2px rgba(0, 0, 0, 0.4), inset 0 1px 1px 1px rgba(255, 255, 255, 0.8);
}
</style>
	<title>Test </title>

    <link rel='stylesheet' href='http://localhost/Wt/css/style.css'type="text/css"/>


<script type="text/javascript">
    /*
        1. Have to enable error checking 
        2. Send questions and answers from database. Unless you want to hard code into page?!

        // onsubmit
    */

        var c=0;          // counter
        var answer = [] ;     // holds question_id and answer 
        var t_id =0;

        window.addEventListener("load", init);


        function init(){
            start=document.querySelector("#start");
            imp = document.querySelector("#imp");
            n = document.querySelector("#next");
            b = document.querySelector("#back");
            s= document.querySelector("#see");
            //x= document.querySelectorAll("input[name^='a[']");
            //sub= document.querySelector("#submit");
            start.addEventListener('click', startTest);
            n.addEventListener('click', next_q);
            //n.addEventListener('click', clear_ans);
            b.addEventListener('click', prev_q);
            s.addEventListener('click', display);
           // sub.addEventListener('click', send_data);

        }


        function clear_ans(){
            var cleared = document.getElementsByName("ans"); 
            for(var i=0; i < cleared.length; i++)
                cleared[i].checked = false;
        }

        


        function next_q(){
            document.getElementById("endInfo").style.display="none";
            if(c!=0){
             answers(c);
            }
            var id = "q"+c;                                   // Starts from question 0 first time
            document.getElementById(id).style.display="none";
            clear_ans();

            c++;
            update_ans(c);


            
            if(c==2){
                document.getElementById("back").style.display="inline";
            }

            if(c==6){
                document.getElementById("next").style.display="none";
                document.getElementById("option").style.display="none";
                document.getElementById("endInfo").style.display="block";
                info= document.createElement("p");
                node= document.createTextNode("End of test!!          Submit your answers or go back to review them!");
                infoNode = info.appendChild(node);
                end_q= document.getElementById("endInfo").appendChild(infoNode);
            } 

            if(c<6){
            id= "q"+c;                                       //Current question
            document.getElementById(id).style.display="block";
            get_q(c,id);
            }

            console.log(c); 
            
        }



        function prev_q() {

            if(c==6){
                end_q.parentNode.removeChild(end_q);
            }
            
            if(c<6){
            answers(c);

            var id = "q"+c;
            document.getElementById(id).style.display="none";
            }

            c--;
            update_ans(c);


            if(c<6){
            document.getElementById("option").style.display="block";
            document.getElementById("next").style.display="inline";


            }

            id= "q"+c;
            document.getElementById(id).style.display="block"; 
            if(c==1){
                document.getElementById("back").style.display="none";
            }
        

            get_q(c,id,1);

            //console.log("q"+c);

        }

        function answers(q){
            var ans = document.querySelector('input[name="ans"]:checked');
            if(ans!=null){
            answer[q] = ans.value;
            console.log("answer", q , " : " , answer[q]);
            }
        }
 
        function update_ans(q){
            var ans = document.querySelectorAll('input[name="ans"]');
            if(answer[q]!=null){
                ans[answer[q]-1].checked=true;
            }
        }

          
        function startTest(){
            start.style.display="none";
            start.style.display="none";
            document.getElementById("next").style.display="inline";
            document.getElementById("option").style.display="block";
            next_q();
        }


        function display(){
            for(var i = 0; i < answer.length ; i++){
                if(answer[i]!=null)
                     document.write("q :" + i + "answer: " + answer[i].value + "\n" );
            }
        }




    function get_q(q,q_id,t_id){

    var req = new XMLHttpRequest();

    var url = "http://localhost/questions.php";
    var vars = "question=" + q + "&test=" + t_id;

    req.open("POST", url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    req.onreadystatechange = function() {
        if(req.readyState == 4 && req.status == 200) {
            var return_data = JSON.parse(req.responseText);
            document.getElementById(q_id).innerHTML = "Question " + q + ": " + return_data[0]['Q'];
             document.getElementById("Op1").innerHTML = "A. " + return_data[1]['Op'];
            document.getElementById("Op2").innerHTML = "B. " + return_data[2]['Op'];
            document.getElementById("Op3").innerHTML = "C. " + return_data[3]['Op'];
            document.getElementById("Op4").innerHTML = "D. " + return_data[4]['Op'];             } 
    }
    // Send the data to PHP now... and wait for response to update the status div
    req.send(vars); // Actually execute the request
    }

        
    function send_data(){
            for(var i= 1; i<6;i++){
                if(answer[i]==0){
                    alert("You have not answered all questions. Are you sure you want to submit?");
                    break;
                }
            }
            for(var j= 1; j<6;j++){
               var x=  document.getElementById(j);
               x.value = answer[j];
               if(answer[j]==null){
                x.value = "0";
               }
                console.log(x.value);
            }   
        }




</script>

</head>
<body onload="init()">


<div id="header" style="background-color:#19334d" >
  <a href="http://localhost/index.php"><img src="http://localhost/Wt/img/edge.jpg" style="margin-left:30%;"></a>
</div>

<div style="background-image:url(img/back3.jpg); background-repeat:no-repeat;
    background-size:cover; height:100%;">
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



<!-- <ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="level(event, '1')">Beginner</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="level(event, '2')">Intermediate</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="level(event, '3')">Pro</a></li>
</ul> -->



<button style="margin-top: 20px;border-radius: 4px;
  border: 1px solid rgba(0, 0, 0, 0.2);margin-left:45%; height:40px; width:70px;box-shadow: 0 2px 6px -2px rgba(0, 0, 0, 0.4), inset 0 1px 1px 1px rgba(255, 255, 255, 0.8);" id="start" > Start Test! </button>

<div class="column" style="margin-left:10px; margin-right:10px;width:95%; height:50px; background-color:#91c0d8">

    <div id="q0" style="display:block">
    <p> Choose the right answer from the following options and click on Submit once you've answered all 5 questions to check your score! </p>
    </div>

    <div id="q1" class="q">
        <p> Question 1: Test </p>
    </div>

    <div id="q2" class="q">
        <p> Question 2: Test </p>
    </div>

    <div id="q3" class="q">
        <p> Question 3: Test </p>
    </div>

    <div id="q4" class="q">
        <p> Question 4: Test </p>
    </div>
    <div id="q5" class="q">
        <p> Question 5: Test </p>
    </div>

</div>



<div class="column" style="text-align:left; margin-left:10px; margin-right:10px;width:95%; height:110px; margin-top: 20px;margin-right:20px;">
    <div id="option" style="display:none">
            <input style="margin-bottom:10px" type="radio" id="A" value="1" name="ans" > <label id="Op1"> </label><br>
            <input style="margin-bottom:10px" type="radio" id="B" value="2" name="ans" > <label id="Op2"> </label><br>
            <input style="margin-bottom:10px" type="radio" id="C" value="3" name="ans" > <label id="Op3"> </label><br>
            <input style="margin-bottom:10px" type="radio" id="D" value="4" name="ans" > <label id="Op4"> </label><br>
    </div>
    
    <form action="http://localhost/Wt/leaderboard.php" method="POST" onsubmit="send_data()">
    <input type="hidden" name="a[1]" id="1" value="0">
    <input type="hidden" name="a[2]" id="2" value="0">
    <input type="hidden" name="a[3]" id="3" value="0">
    <input type="hidden" name="a[4]" id="4" value="0">
    <input type="hidden" name="a[5]" id="5" value="0">
    </div>
    <input type="submit" id="isubmit" style="float:right; margin-top:5px; margin-right:30px">
    </form>
    


<div id="imp">
    <span>  <button id="back" style="display:none;" > BACK </button> 
  <button id="next" style="margin-top:2px;display:none; border-radius: 4px;
  border: 1px solid rgba(0, 0, 0, 0.2);margin-left:10px; height:40px; width:70px;box-shadow: 0 2px 6px -2px rgba(0, 0, 0, 0.4), inset 0 1px 1px 1px rgba(255, 255, 255, 0.8);"> NEXT </button> 
            <button id="see" style="display:none"> See Answers </button> </span>
            
    <div id="endInfo">
    </div>

</div>

</div>
</body>
</html>
