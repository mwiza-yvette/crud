<?php include('dbcon.php') ?>
<?php

if(isset($_POST['add_students'])){
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if($fname == "" || empty($fname)){
        header('location:indeex.php?message=you have to fill firstName!');
    }
    elseif($lname == "" || empty($lname)){
        header('location:indeex.php?message=you have to fill lastname!');

    }
    elseif($age == "" || empty($age)){
        header('location:indeex.php?message=you have to fill age!');

    }
else{
    $query = "INSERT INTO inputs(firstname,lastname,age) values('$fname','$lname','$age')";
    $result =mysqli_query($connection,$query);   
    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        header('location:indeex.php?insert_msg=your data have been inserted successfuly');
    }
}
}


?>