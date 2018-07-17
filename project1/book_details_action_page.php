<?php
include ('configuration.php');
$value=$_POST['account_no'];
$value1=$_POST['book_title'];
$value2=$_POST['Author_name'];
$value5=$_POST['Year'];
$value6=$_POST['Edition'];
$value7=$_POST['Price'];
/*echo $value;
echo $value1;
echo $value2;
echo $value3;
echo $value4;
echo $value5;
echo $value6;
echo $value7;*/
$sql = "INSERT INTO book (account_no,book_title,Author_name,Year,Edition,Price,status) VALUES ('$value','$value1','$value2','$value5','$value6','$value7','Available')";
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
}
