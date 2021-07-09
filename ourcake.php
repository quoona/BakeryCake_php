<?php 
include './partials/_dbconnect.php';
include './partials/_nav.php';


?>

<!--================End Main Header Area =================-->
<section style="margin-top: 50px;" class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Our Cakes</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="ourcake.php">Services</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->

        <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Our Cakes</h2>
        			<h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</h5>
        		</div>
        		<div class="cake_feature_row row">

                <?php
            
            $sql = "SELECT * FROM `cake` ";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $cakeId = $row['cakeId'];
                $cakeName = $row['cakeName'];
                $cakePrice = $row['cakePrice'];
                $cakeDesc = $row['cakeDesc'];
            
                echo '<div class="col-lg-3 col-md-4 col-6">
                        <div class="cake_feature_item">
                            <div class="cake_img">
                                  <img src="img/cake-'.$cakeId. '.jpg" alt="image for this cake">
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
                                        echo '<form action="partials/_manageCart.php" method="POST">
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
            
            ?>






					
				</div>
        	</div>
        </section>
        <!--================End Blog Main Area =================-->



































<?php include './partials/_footer.php'  ?>