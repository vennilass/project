<?php
include 'configuration.php';
$book=$_POST['accession_number'];
  $change="update book set status='Available' where account_no='$book'";
 if(!mysql_query($change))
   {
     die('Error:'.mysql_error());
   }
$val1=date("d-m-Y");
$transaction_update="update transaction set data_of_return='$val1',status='Returned' where book_id='$book'";
if(!mysql_query($transaction_update))
   {
     die('Error:'.mysql_error());
   }
   else{
       echo "returned";
       header("Refresh:2; url=returnbook.html");
       
   }
