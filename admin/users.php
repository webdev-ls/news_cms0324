<?php include "header.php"; ?>
<?php 

require_once "../server/functions.php";

$result = getUsers();

$user = $result->fetch_assoc() ?? [];
// while($row=$result->fetch_assoc()){ 
    // echo "<pre>";
    // print_r($user);
    // echo "</pre>";
// }


?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                        <?php foreach($user as $key => $value){ ?>
                            <th><?=$key?></th>
                        <?php } ?>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                            <tr>
                                <?php foreach($user as $key => $value){ ?>
                                    <td><?=$value?></td>
                                <?php } ?>
                                <td class='edit'><a href='update-user.php'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-user.php'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php 
                        while($row=$result->fetch_assoc()){ ?>
                            <tr>
                                <?php foreach($row as $key => $value){ ?>
                                    <td><?=$value?></td>
                                <?php } ?>
                                <td class='edit'><a href='update-user.php'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-user.php'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "header.php"; ?>
