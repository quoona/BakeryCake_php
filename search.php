<?php include 'partials/_dbconnect.php';?>
<?php require 'partials/_nav.php' ?>
<body>
    
<!--================End Main Header Area =================-->
<section style="margin-top: 50px;" class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Search</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="shop.php">Search</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
    <section class="welcome_bakery_area cake_feature_main p_100">
        	<div class="container">
        
        <div class="main_title">
					<h2>Search Result for <em>"<?php echo $_GET['search']?>"</em> :</h2>
                    <h3>Category:</h3>
				</div>
        <div class="row">
        <?php 
            $noResult = true;
            $query = $_GET["search"];
            $sql = "SELECT * FROM `categories` WHERE MATCH(categorieName, categorieDesc) against('$query')";
 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?><script> document.getElementById("cat").innerHTML = "Category: ";</script> <?php 
                $noResult = false;
                $catId = $row['categorieId'];
                $catname = $row['categorieName'];
                $catdesc = $row['categorieDesc'];
                
                echo '<div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                    <div class="cake_img">
                        <img src="img/card-'.$catId. '.jpg" class="card-img-top" alt="image for this cake">
                            </div>
                        
                            <div class="cake_text">
                            <h3 ><a href="viewcakeList.php?catid=' . $catId . '">' . $catname . '</a></h5>
                            <p >' . substr($catdesc, 0, 29). '...</p>
                            <a href="viewcakeList.php?catid=' . $catId . '" class="pest_btn">View All</a>
                            
                        </div>
                    </div>
                </div>';
            }
        ?>
        </div>
    </div>

    <div class="container my-3" id="cont">
        <h3>Item:</h3>
        <div class="row">
        <?php 
            $query = $_GET["search"];
            $sql = "SELECT * FROM `cake` WHERE MATCH(cakeName, cakeDesc) against('$query')"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?><script> document.getElementById("iteam").innerHTML = "Items: ";</script> <?php
                $noResult = false;
                $cakeId = $row['cakeId'];
                $cakeName = $row['cakeName'];
                $cakePrice = $row['cakePrice'];
                $cakeDesc = $row['cakeDesc'];
                $cakeCategorieId = $row['cakeCategorieId'];
                
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
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>';
                                    }else {
                                        echo '<a href="viewCart.php"><button class="pest_btn">Go to Cart</button></a>';
                                    }
                                }
                                else{
                                    echo '<button class="pest_btn" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                                }
                                echo '</form>
                                
                            </div>
                        </div>
                    </div>
                </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1>Your search - <em>"' .$_GET['search']. '"</em> - No Result Found.</h1>
                        <p class="lead"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li></ul>
                        </p>
                    </div>
                </div> ';
            }
        ?>
        </div>
        </div>
    </div>
    </section>
    <?php require 'partials/_footer.php' ?>
