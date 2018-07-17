<?php
include("configuration.php");
   session_start();
  $entered_username=$_POST['uname'];
  $entered_password=$_POST['psw'];
  $entered_username=strtoupper($entered_username);
  $entered_password=  strtoupper($entered_password);
  $flag=0;
   $sql="select facultyname from faculty_name where f_username='$entered_username' and f_password='$entered_password'";
   if(!mysql_query($sql))
   {
        die('Error:'.mysql_error());
    }
    else{
     {
     $results =  mysql_query($sql);
      echo '<head><link rel="stylesheet" type="text/css" href="style.css"></head>';
    while($row = mysql_fetch_array($results)){
    echo "WELCOME ".$row['facultyname'];
    echo '<br><center><h6>Loading......</h6>';
   header("Refresh:2; url=search.html");
    $flag++;
    }
    if($flag==0){
        echo "Invalid username/password</br>";
        echo "Please try again!!!!";
        header("Refresh:2; url=login.html");
    }
    }
}
