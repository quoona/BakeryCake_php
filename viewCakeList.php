<?php include 'partials/_dbconnect.php';?>
<?php require 'partials/_nav.php' ?>
<body>
    
<!--================End Main Header Area =================-->
<section style="margin-top: 50px;" class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cake</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
    

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE categorieId = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['categorieName'];
            $catdesc = $row['categorieDesc'];
        }
    ?>
  
    <!-- cake container starts here -->
    <div class="container my-3" id="cont">
        
        <div class="row">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `cake` WHERE cakeCategorieId = $id";
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
                        <p class="display-4">Sorry In this category No items available.</p>
                        <p class="lead"> We will update Soon.</p>
                    </div>
                </div> ';
            }
            ?>
        </div>
    </div>


    <?php require 'partials/_footer.php' ?>
    
    
    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 
