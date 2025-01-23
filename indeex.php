<?php include('header.php') ?>
<?php include('dbcon.php') ?>

    <div class="box1">
        <h2>all students</h2>
        <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> ADD inputs</button>
</div>
    <table class= "table table-hover table-bordered tabl-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "select * from `inputs`";
            
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("query fail".mysqli_error());
            }
            else{
                while($row =mysqli_fetch_assoc($result)){
                    ?>
                  
             <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['age'];?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success ">Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger ">Delete</a></td>
            </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>

    <?php
    if(isset($_GET['message'])){
      echo "<h6>".$_GET['message']."</h6>";
    }
    ?>

<?php
    if(isset($_GET['insert_sms'])){
      echo "<h6>".$_GET['insert_sms']."</h6>";
    }
    ?>
    <!-- <?php
    if(isset($_GET['delete_msg'])){
      echo "<h6>".$_GET['delete_msg']."</h6>";
    }
    ?> -->
    <!-- insert_smsorm action="insert_data.php" method="post" > -->
     <!-- Modal -->
      <form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD inputs</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="">FirstName</label>
          <input type="text" name="f_name" class="form-control" values="<?php echo $row ['firstname']?>">
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="l_name" class="form-control" values="<?php echo $row ['lastname']?>">
        </div>
        <div class="form-group">
          <label for="">Age</label>
          <input type="text" name="age" class="form-control" values="<?php echo $row ['age']?>">
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abort</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD"></button>
      </div>
    </div>
  </div>
</div>
</form>
    <?php include('footer.php') ?>
