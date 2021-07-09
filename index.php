<?php include_once 'partials/_dbconnect.php';?>
<?php require_once 'partials/_nav.php' ?>
<?php include_once ('partials/banner.php'); ?>
<body>

  
  
<!--================Welcome Area =================-->
<section class="welcome_bakery_area cake_feature_main p_100">
        	<div class="container">
				<div class="main_title">
					<h2>Our Featured Cakes</h2>
					<h5> Seldolor sit amet consect etur</h5>
				</div>
				<div class="cake_feature_row row">
        <?php
            
            $sql = "SELECT * FROM `cake` ORDER BY cakePubDate LIMIT 4  ";
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
                                <h3 >' . substr($cakeName, 0, 20). '...</h3>
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

				</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->
<!--================Service We offer Area =================-->
<section class="service_we_offer_area p_100">
        	<div class="container">
        		<div class="single_w_title">
        			<h2>Services We offer</h2>
        		</div>
        		<div class="row we_offer_inner">
        			<div class="col-lg-4">
        				<div class="s_we_item">
        					<div class="media">
        						<div class="d-flex">
        							<i class="flaticon-food-6"></i>
        						</div>
        						<div class="media-body">
        							<a href="#"><h4>Cookies Cakes</h4></a>
        							<p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="s_we_item">
        					<div class="media">
        						<div class="d-flex">
        							<i class="flaticon-food-5"></i>
        						</div>
        						<div class="media-body">
        							<a href="#"><h4>Tasty Cupcakes</h4></a>
        							<p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="s_we_item">
        					<div class="media">
        						<div class="d-flex">
        							<i class="flaticon-food-3"></i>
        						</div>
        						<div class="media-body">
        							<a href="#"><h4>Wedding Cakes</h4></a>
        							<p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="s_we_item">
        					<div class="media">
        						<div class="d-flex">
        							<i class="flaticon-book"></i>
        						</div>
        						<div class="media-body">
        							<a href="#"><h4>Awesome Recipes</h4></a>
        							<p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="s_we_item">
        					<div class="media">
        						<div class="d-flex">
        							<i class="flaticon-food-4"></i>
        						</div>
        						<div class="media-body">
        							<a href="#"><h4>Menu Planner</h4></a>
        							<p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="s_we_item">
        					<div class="media">
        						<div class="d-flex">
        							<i class="flaticon-transport"></i>
        						</div>
        						<div class="media-body">
        							<a href="#"><h4>Home Delivery</h4></a>
        							<p>Lorem Ipsum is  simply my text of the printing and Ipsum is simply text of the Ipsum is simply.</p>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Service We offer Area =================-->
        
            <!--================Discover Menu Area =================-->
        <section class="discover_menu_area menu_d_two">
        	<div class="discover_menu_inner">
        		<div class="container">
        			<div class="single_pest_title">
						<h2>Services We offer</h2>
					</div>
       				<div class="row">
       					<div class="col-lg-6">
       						<div class="discover_item_inner">
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
            
                echo '<div class="discover_item">
                <h4>'.$cakeName.'</h4>
                <p>'.$cakeDesc.' <span>'.$cakePrice.'đ</span></p>
                </div>';
            }
            
            ?>
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       						</div>
       					</div>
       					<div class="col-lg-6">
       						<div class="discover_item_inner">
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       							<div class="discover_item">
									<h4>Double Chocolate Pie</h4>
									<p>Chocolate puding, vanilla, fruite rasberry jam milk <span>$8.99</span></p>
								</div>
       						</div>
       					</div>
       					<div class="col-lg-12">
       						<a class="pest_btn" href="#">View Full Menu</a>
       					</div>
       				</div>
        		</div>
        	</div>
        </section>
        <!--================End Discover Menu Area =================-->
            <!--================End Client Says Area =================-->
        <section class="our_chef_area p_100">
        	<div class="container">
        		<div class="row our_chef_inner">
        			<div class="col-lg-3">
        				<div class="chef_text_item">
        					<div class="main_title">
								<h2>Our Chefs</h2>
								<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion.</p>
							</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="img/chef/chef-1.jpg" alt="">
        						<ul class="list_style">
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-skype"></i></a></li>
        						</ul>
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="img/chef/chef-2.jpg" alt="">
        						<ul class="list_style">
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-skype"></i></a></li>
        						</ul>
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="img/chef/Binh.jpg" alt="">
        						<ul class="list_style">
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-skype"></i></a></li>
        						</ul>
        					</div>
        					<a href="#"><h4>Michale Binh</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Client Says Area =================-->












    <?php require 'partials/_footer.php' ?>
