<?php
include ('configuration.php');
$fileHandle = fopen("bookdetails.csv", "r");
 
//Loop through the CSV rows.
while (($row = fgetcsv($fileHandle)) !== FALSE) {
 $sql="insert into book(account_no,book_title,Author_name ,Issue_No ,Publisher,Year ,Edition,Price ,status)values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','Available')";
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
}
  
}
/*$sql="create table book(account_no int primary key,book_title varchar(100),Author_name varchar(100),Issue_No int,Publisher varchar(100),Year int,Edition int,Price double(10,2),status varchar(50))";
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
}
else{
    echo 'sucess';
}*/
