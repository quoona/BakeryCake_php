<?php 
session_start();
include '_dbconnect.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}

$sql = "SELECT * FROM `sitedetail`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$systemName = $row['systemName'];
if (isset($_POST['cateid'])) {
  

$sql = "SELECT * FROM `cake` where cakeCategorieId = '".$_POST['cateid']."' ";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $cakeId = $row['cakeId'];
                $cakeName = $row['cakeName'];
                $cakePrice = $row['cakePrice'];
                $cakeDesc = $row['cakeDesc'];
            
                echo '<div  class="col-lg-4 col-md-4 col-6">
                        <div  class="cake_feature_item">
                            <div class="cake_img">
                                  <img src="./img/cake-'.$cakeId. '.jpg" alt="image for this cake">
                            </div>
                            
                              <div class="cake_text">
                                <h3 class="card-title">' . substr($cakeName, 0, 20). '...</h3>
                                <h4 style="font-size:20px"> '.substr($cakePrice,0, 5). 'đ</h4>
                                
                                <div class="row justify-content-center">';
                                if($loggedin){
                                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE cakeId = '$cakeId' AND `userId`='$userId'";
                                    $quaresult = mysqli_query($conn, $quaSql);
                                    $quaExistRows = mysqli_num_rows($quaresult);
                                    if($quaExistRows == 0) {
                                        echo '<form action="_manageCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="'.$cakeId. '">
                                              <button type="submit" name="addToCart" class="pest_btn">Add to Cart</button>';
                                    }else {
                                        echo '<a  class="pest_btn" href="viewCart.php">Go to Cart</a>';
                                    }
                                }
                                else{
                                    echo '<a href="#" class="pest_btn" data-toggle="modal" data-target="#loginModal">Add to Cart</a>
                                    
                                    
                                    
                                    ';
                                }
                            echo '</form>                            
                                
                            </div>
                            </div>
                        </div>
                    </div>';
            }

        } else {
            echo'not found';
        }
























?>


