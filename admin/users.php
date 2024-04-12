<?php include "header.php"; ?>
<?php 

require_once "../server/functions.php";
$currentPage = $_GET['page'] ?? 1;
$perPage = 10;
$result = getUsers($perPage,($currentPage -1) * $perPage);
$totalUsers = getTotalUsersCount();

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
                        <?php 
                        $currentPageUrl = trim($_SERVER['REQUEST_URI'],"/");
                        // echo "<pre>";
                        // print_r(explode('?',$currentPageUrl)[0]."?edit"); exit;

                        // echo ''.$currentPageUrl.'?edit';exit;
                        // echo in_array(explode('?',$currentPageUrl)[0]."?edit",$accessMap[$_SESSION['role']]); exit;
                        // echo $currentPageUrl.'?edit';
                        // print_r($accessMap[$_SESSION['role']]);

                        if(in_array(explode('?',$currentPageUrl)[0]."?edit",$accessMap[$_SESSION['role']])){
                            echo "<th>Edit</th>";
                        }
                        if(in_array(explode('?',$currentPageUrl)[0]."?delete",$accessMap[$_SESSION['role']])){
                            echo "<th>Delete</th>";
                        }

                        // echo "<pre>";
                        // $filter = array_filter($accessMap['admin'],function($value) use ($currentPageUrl){
                        //     return $value == explode('?',$currentPageUrl)[0]."?edittttttt";
                        // });

                        // print_r($filter);
                        // exit;
                        ?>
                      </thead>
                      <tbody>
                            <tr>
                                <?php foreach($user as $key => $value){ ?>
                                    <td><?=$value?></td>
                                <?php } ?>
                                <?php 
                                if(in_array(explode('?',$currentPageUrl)[0]."?edit",$accessMap[$_SESSION['role']])){
                                    echo "<td class='edit'><a href='update-user.php?id={$user['uid']}'><i class='fa fa-edit'></i></a></td>";
                                }
                                if(in_array(explode('?',$currentPageUrl)[0]."?delete",$accessMap[$_SESSION['role']])){
                                    echo "<td class='delete'><a href='delete-user.php'><i class='fa fa-trash-o'></i></a></td>";
                                }
                                ?>
                                
                                
                            </tr>
                        <?php 
                        while($row=$result->fetch_assoc()){ ?>
                            <tr>
                                <?php foreach($row as $key => $value){ ?>
                                    <td><?=$value?></td>
                                <?php } ?>
                                <?php 
                                 if(in_array(explode('?',$currentPageUrl)[0]."?edit",$accessMap[$_SESSION['role']])){
                                    echo "<td class='edit'><a href='update-user.php?id={$row['uid']}'><i class='fa fa-edit'></i></a></td>";
                                }
                                if(in_array(explode('?',$currentPageUrl)[0]."?delete",$accessMap[$_SESSION['role']])){
                                    echo "<td class='delete'><a href='../server/deleteUserScript.php?id={$row['uid']}'><i class='fa fa-trash-o'></i></a></td>";
                                }
                                 
                                 
                                 ?>
                            </tr>
                        <?php } ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                    <?php  
                    $totalPages = $totalUsers/$perPage + ($totalUsers%$perPage === 0 ? 0 : 1);
                    for($i = 1; $i <= $totalPages; $i++){ ?>
                        <li class="<?=$currentPage == $i ? "active" : ""?>"><a href="?page=<?=$i?>"><?=$i?></a></li>
                    <?php }
                    ?>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
