<?php
include("configuration.php");
   session_start();
  $entered_username=$_POST['uname'];
  $entered_password=$_POST['psw'];
  $entered_username=strtoupper($entered_username);
  $entered_password=  strtoupper($entered_password);
  $flag=0;
   echo '<head><link rel="stylesheet" type="text/css" href="style.css"></head>';
   if($entered_username=="LIB" && $entered_password=="LIB"){
       $flag++;
       echo 'Welcome...<br><center><h6>Loading....</h6>';
       header("Refresh:2; url=book_issue.html");
   }
    if($flag==0){
        echo "Invalid username/password</br>";
        echo "Please try again!!!!";
        header("Refresh:2; url=login_lib.html");
    }
