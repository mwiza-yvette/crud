<?php
include('dbcon.php');
    if(isset($_GET['id'])){
        $id =$_GET['id'];
        $query = "DELETE FROM inputs WHERE id = '$id'";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die("query failed".mysqli_error());
        }else{
           header('location:indeex.php?delete_msg=You have deleted this record.');
        }
    }
?>