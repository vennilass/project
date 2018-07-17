<?php
include 'configuration.php';
$user=$_POST['s_id'];
$book=$_POST['accession_number'];
$user=strtoupper($user);
$book=strtoupper($book);
//sql="create table transaction(student_id varchar(100) primary key,student_name varchar(100),department varchar(100),author_name varchar(100),book_name varchar(100),date_of_issue varchar(100),data_of_return varchar(100),issue_time time,return_time time,status varchar(50))";
 $u=0;
 $b=0;
 //echo $user." ".$book;
 $sql="select student_name from student_login where s_username='$user'";
   if(!mysql_query($sql))
   {
        die('Error:'.mysql_error());
    }
    else{
     {
     $results =  mysql_query($sql);
    while($row = mysql_fetch_array($results)){
    //echo "WELCOME ".$row['student_name'];
    $u++;
     }
    }}
$sql1="select * from book where account_no=$book";
if(!mysql_query($sql1))
   {
        die('Error:'.mysql_error());
    }
    else{
    $results =  mysql_query($sql1);
    while($row = mysql_fetch_array($results)){
        $b++;
    }
    }
 if($u==0 && $b==0){
     echo '<center><h1>INCORRECT ACCESSION NUMBER AND USERNAME<br>';
     header("Refresh:2; url=book_issue.html");
 }
 else if($u==0 && $b==1){
     echo '<center><h1>USER NOT FOUND<br>';
     header("Refresh:2; url=book_issue.html");
 }
 else if($u==1 && $b==0){
     echo '<center><h1>BOOK NOT FOUND<br>';
     header("Refresh:2; url=book_issue.html");
 }
 else{
    $sql0="select status from book where account_no='$book'";
    if(!mysql_query($sql0))
   {
        die('Error:'.mysql_error());
    }
    $results =  mysql_query($sql0);
    while($row = mysql_fetch_array($results)){
    if($row['status']=="Available") {
        
    $change="update book set status='Issued' where account_no='$book'";
     if(!mysql_query($change))
   {
        die('Error:'.mysql_error());
    }
$se="select * from transaction where book_id='$book'";
$ch=0;
$re=null;
$results =  mysql_query($se);
    while($row = mysql_fetch_array($results)){
        $ch++;
        $re=$row['data_of_return'];
     }
     echo 'value:'.$ch;
$val1=$book;//book_id
$val2=$user;//student_id(form)
$student="select * from student_login where s_username='$user'";
$val3=null;//student_name
$val4=null;//department
 $results =  mysql_query($student);
    while($row = mysql_fetch_array($results)){
        $val3=$row['student_name'];
        $val4=$row['department'];
     }
$val5=null;//author_name
$val6=null;//book_name
$bo="select * from book where account_no='$book'";
$results1 =  mysql_query($bo);
    while($row = mysql_fetch_array($results1)){
        $val5=$row['Author_name'];
        $val6=$row['book_title'];
     }
$val7=date("d-m-Y");
$sql="insert into transaction(book_id,student_id,student_name,department,author_name,book_name,date_of_issue,status)"
        . "values('$val1','$val2','$val3','$val4','$val5','$val6','$val7','Issued')";
if(!mysql_query($sql))
   {
        echo 'not working';
        die('Error:'.mysql_error());
    }
    else{
        echo 'Issued';
        header("Refresh:2; url=book_issue.html");
    }
    }  else {
         echo "<center><h1>Book Already Issued</h1><br>";
    $se="select * from transaction where book_id='$book'";
    $results =  mysql_query($se);
    $v1=null;
    $v2=null;
    $v3=null;
    $v4=null;
    while($row = mysql_fetch_array($results)){
       $v1=$row['student_id'];
       $v2=$row['student_name'];
       $v3=$row['department'];
        $v3=  str_replace('_',' ', $v3);
       $v4=$row['date_of_issue'];
     }
    echo "<table width='50%'><tr><td>Register Number</td><td>Student Name</td><td>Department</td><td>Date of Issue</td></tr>"
     . "<tr><td>$v1</td><td>$v2</td><td>$v3</td><td>$v4</td></tr><br></table>";
     echo '<style>a{text-decoration : none; color :WHITE;background-color:BLACK;}</style>';
     echo '<a href="book_issue.html"><h2>Back</a><br>';
    }
    }
    header("Refresh:2; url=book_issue.html");
 }
