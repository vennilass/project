<?php
include 'configuration.php';
$sql="select * from transaction";
echo '<head><link rel="stylesheet" type="text/css" href="style.css"></head>';
if(!mysql_query($sql))
   {
        //die('Error:'.mysql_error());
    }
    else{
    $results =  mysql_query($sql);
    echo ' <table style="width:100%"><tr>
    <th>BOOK ID</th>
    <th>STUDENT ID</th>
    <th>STUDENT NAME</th>
    <th>DEPARTMENT</th>
    <th>BOOK NAME</th>
    <th>AUTHOR NAME</th>
    <th>ISSUE DATE</th>
    <th>RETURNED DATE</th>
    <th>STATUS</th>
     </tr>';
    while($row = mysql_fetch_array($results)){
        echo ' <tr>
        <td>'.$row['book_id'].'</td>
       <td>'.$row['student_id'].'</td> '
                . '<td>'.$row['student_name'].'</td> <td>'.$row['department'].'</td> <td>'.$row['book_name'].'</td>
            <td>'.$row['author_name'].'</td>
                 <td>'.$row['date_of_issue'].'</td>
                      <td>'.$row['data_of_return'].'</td>
                           <td>'.$row['status'].'</td>
        </tr>';
    }
    echo '</table>';
    echo '<center><a href="search1.html">Back</a><br><a href="home.html">Logout</a>';
     }
