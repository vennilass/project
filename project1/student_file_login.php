<?php
include ('configuration.php');
$fileHandle = fopen("ADDITIONAL.csv", "r");
 
//Loop through the CSV rows.
while (($row = fgetcsv($fileHandle)) !== FALSE) {
// $sql="insert into student_login(s_username,s_password,student_name)values('$row[0]','$row[0]','$row[1]')";
  $sql="update student_login set department='$row[1]',phone_number='$row[2]' where s_username='$row[0]'";
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
}
  
}
//$sql="truncate table student_login";
/*$sql = "create table student_login(s_username varchar(15) primary key,s_password varchar(15),student_name varchar(15))";
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
}*/
