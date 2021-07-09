<?php 
include './partials/_dbconnect.php';
include './partials/_nav.php';


?>





<!--================End Main Header Area =================-->
<section style="margin-top: 50px;" class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Shop</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="shop.php">Shop</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->


<!--================Product Area =================-->
<section class="product_area p_100">
        	<div class="container">
        		<div  class="row product_inner_row">
        			<div class="col-lg-9">
        				<div class="row m0 product_task_bar"> 
							<div class="product_task_inner"> 
								
								
							</div>
        				</div>
        				<div id="cake" name="cake"  class="row product_item_inner">
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
            
                echo '<div  class="col-lg-4 col-md-4 col-6">
                        <div  class="cake_feature_item">
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
        				<div class="product_pagination">
        					<div class="left_btn">
        						<a href="#"><i class="lnr lnr-arrow-left"></i> New posts</a>
        					</div>
        					<div class="middle_list">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item active"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">...</a></li>
									<li class="page-item"><a class="page-link" href="#">12</a></li>
									</ul>
								</nav>
        					</div>
        					<div class="right_btn"><a href="#">Older posts <i class="lnr lnr-arrow-right"></i></a></div>
        				</div>
        			</div>
        			<div class="col-lg-3">
        				<div class="product_left_sidebar">
        					<aside class="left_sidebar search_widget">
        						<div class="input-group">
									<input type="text" class="form-control" placeholder="Enter Search Keywords">
									<div class="input-group-append">
										<button class="btn" type="button"><i class="icon icon-Search"></i></button>
									</div>
								</div>
        					</aside>
        					<aside class="left_sidebar p_catgories_widget">
        						<div class="p_w_title">
        							<h3>Product Categories</h3>
        						</div>
        						<ul class="list_style">
                                
                                <?php
                                    
                                    $sql = "SELECT * FROM `categories` ";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $catname = $row['categorieName'];
                                        $cateid = $row['categorieId'];
                                        $catdesc = $row['categorieDesc'];
                                        echo'<li class="cateid" value="'.$cateid.'" name="cateid" ><a  href="#">'.$catname.'</a></li>';

                                    }
                                ?>	
        						</ul>
        					</aside>
        					<aside class="left_sidebar p_price_widget">
        						<div class="p_w_title">
        							<h3>Filter By Price</h3>
        						</div>
        						<div class="filter_price">
									<div id="slider-range"></div>
       								<label for="amount">Price range:</label>
									<input type="text" id="amount" readonly />
       								<a href="#">Filter</a>
        						</div>
        					</aside>
        					<aside class="left_sidebar p_sale_widget">
        						<div class="p_w_title">
        							<h3>Top Sale Products</h3>
        						</div>
        						<div class="media">
        							<div class="d-flex">
        								<img src="img/product/sale-product/s-product-1.jpg" alt="">
        							</div>
        							<div class="media-body">
        								<a href="#"><h4>Brown Cake</h4></a>
        								<ul class="list_style">
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        								</ul>
        								<h5>$29</h5>
        							</div>
        						</div>
        						<div class="media">
        							<div class="d-flex">
        								<img src="img/product/sale-product/s-product-2.jpg" alt="">
        							</div>
        							<div class="media-body">
        								<a href="#"><h4>Brown Cake</h4></a>
        								<ul class="list_style">
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        								</ul>
        								<h5>$29</h5>
        							</div>
        						</div>
        						<div class="media">
        							<div class="d-flex">
        								<img src="img/product/sale-product/s-product-3.jpg" alt="">
        							</div>
        							<div class="media-body">
        								<a href="#"><h4>Brown Cake</h4></a>
        								<ul class="list_style">
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        								</ul>
        								<h5>$29</h5>
        							</div>
        						</div>
        						<div class="media">
        							<div class="d-flex">
        								<img src="img/product/sale-product/s-product-4.jpg" alt="">
        							</div>
        							<div class="media-body">
        								<a href="#"><h4>Brown Cake</h4></a>
        								<ul class="list_style">
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        									<li><a href="#"><i class="fa fa-star-o"></i></a></li>
        								</ul>
        								<h5>$29</h5>
        							</div>
        						</div>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Product Area =================-->



















<?php include './partials/_footer.php'  ?>