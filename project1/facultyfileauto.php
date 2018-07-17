<?php
include ('configuration.php');
$fileHandle = fopen("staff_login_excel.csv", "r");
 
//Loop through the CSV rows.
while (($row = fgetcsv($fileHandle)) !== FALSE) {
 $sql="insert into faculty_name(f_username,f_password,facultyname)values('$row[0]','$row[0]','$row[1]')";
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
}
  
}
/*$sql = "create table student_login(s_username varchar(15) primary key,s_password varchar(15),student_name varchar(15))";
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
}*/
