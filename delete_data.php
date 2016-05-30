<?php

// php code to Delete data from mysql database 

if(isset($_POST['id']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "bookingform";
    
    // get id to delete
    $id = $_POST['id'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connect) {
    die('Could not connect: ' . mysqli_error($connect));
}
    
    // mysql delete query 
    $query = "DELETE FROM bookingform WHERE ID = $id";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo 'Data Deleted';
    }else{
        echo 'Data Not Deleted';
    }
    mysqli_close($connect);
}

?>