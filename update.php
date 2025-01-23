<?php 
include('header.php');
include('dbcon.php'); 
include('footer.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "select * from `inputs` where `id`='$id'";
            
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("query fail".mysqli_error());
            }
            else{
                $row =mysqli_fetch_assoc($result);
            }
                   
        }
        if(isset($_POST['update_students'])){
          // if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
          
          $fname=$_POST['f_name'];
          $lname=$_POST['l_name'];
          $age=$_POST['age'];

          $update ="update inputs set firstname='$fname', lastname='$lname', age='$age' where `id` = '$idnew' " ;
          
          $updated = mysqli_query($connection,$update);
          if(!$updated){
              // die("query fail".mysqli_error());
              echo "ftff";
          }

          else{
            header('location:indeex.php?update_mgs=you have update data');
          }
          }

        //}
        // if(isset())
        

?>

        <form action="update.php?id_new=<?php echo $id;?>" method="post">
        <div class="form-group">
          <label for="">FirstName</label>
          <input type="text" name="f_name" class="form-control" placeholder="<?php
              echo $row['firstname'];?>">
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="l_name" class="form-control" placeholder="<?php
          echo $row['lastname'];
           ?>">
        </div>
        <div class="form-group">
          <label for="">Age</label>
          <input type="text" name="age" class="form-control" placeholder="<?php 
          echo $row['age']
          ?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE"></button>
        </form>

  