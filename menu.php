<?php 
include './partials/_dbconnect.php';
include './partials/_nav.php';


?>

<!--================End Main Header Area =================-->
<section style="margin-top: 50px;" class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Menu</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="menu.php">Menu</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->

<!--================Discover Menu Area =================-->
<section class="discover_menu_area menu_d_two">
        	<div class="discover_menu_inner">
        		<div class="container">
                <div class="single_pest_title">
        				<h2>Our Price List</h2>
        				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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
       					
       				</div>
        		</div>
        	</div>
        </section>
        <!--================End Discover Menu Area =================-->
        <?php include './partials/_footer.php'  ?>