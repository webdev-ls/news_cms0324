<?php include "header.php"; ?>
<?php 

require_once "../server/functions.php";
$result = getCategory($_GET['id']);

$user = $result->fetch_assoc() ?? [];
// while($row=$result->fetch_assoc()){ 
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";
// }

// foreach ($user as $key => $value) {
//     echo $key."   ".$value."<br>"; 
// }

// exit;


?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="../server/updateCategoryScript.php" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="uid"  class="form-control" value="<?=$user['uid']?>" placeholder="" >
                    </div>
                    <?php 
                    foreach ($user as $key => $value) { ?>
                        <div class="form-group">
                            <label><?=$key?></label>
                            <input type="text" name="<?=$key?>" class="form-control" value="<?=$value?>" placeholder="" required>
                        </div>
                        
                   <?php  } 
                    ?>
                      <!-- <div class="form-group">
                          <label>Mobile</label>
                          <input type="text" name="mobile" class="form-control" value="<?=$user['mobile']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="<?=$user['email']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="password" class="form-control" value="<?=$user['password']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                              <option <?=$user['role'] == "user" ? "selected" : ""?> value="user">normal User</option>
                              <option <?=$user['role'] == "admin" ? "selected" : ""?>  value="admin">Admin</option>
                          </select>
                      </div> -->
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
