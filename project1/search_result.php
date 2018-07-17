<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'configuration.php';
 echo '<head><link rel="stylesheet" type="text/css" href="style.css"></head>';
echo'<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center; 
}
</style>
</head>';
$search_by_book=$_POST['search_b'];
$search_by_author=$_POST['search_a'];
$key=NULL;
$sql=NULL;
if($search_by_book==NULL && $search_by_author==NULL || $search_by_book!=NULL && $search_by_author!=NULL){
    echo '<center><h1>INVALID INPUT<br>';
    header("Refresh:2; url=search.html");
}
else if($search_by_book!=NULL){
   $key=$search_by_book;
   $sql="select * from book where book_title like '%$key%'";
}
else{
    $key=$search_by_author;
    $sql="select * from book where Author_name like '%$key%'";
}
$flag=0;
 if(!mysql_query($sql))
   {
        //die('Error:'.mysql_error());
    }
    else{
     {
    $results =  mysql_query($sql);
   
    echo ' <table style="width:100%"><tr>
    <th>S.NO</th>
    <th>Book Title</th>
    <th>Author</th>
    <th>ISSUE NO</th>
    <th>STATUS</th>
  </tr>';
    $val=0;
    while($row = mysql_fetch_array($results)){
        $val=$val+1;
        $v1=$row['book_title'];
        $v2=$row['Author_name'];
        $v1=str_replace("_", " ",$v1);
        $v2=  str_replace("_"," ", $v2);
    echo '<tr><td>'.$val.'</td><td>'.$v1.'</td><td>'.$v2.'</td><td>'.$row['Issue_No'].'</td><td>'.$row['status'].'</td></tr>';
    $flag++;
    }
    echo '</table>';
    if($flag==0){
        echo '<center>OOPS!!!!!No match found';
    }
    echo '<center><a href="search.html">Search Another</a><br><a href="home.html">Logout</a>';
    }
}
