<?php include 'partials/_dbconnect.php';?>
<?php require 'partials/_nav.php' ?>





!--================End Main Header Area =================-->
<section style="margin-top: 50px;" class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cart</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="cart.html">Cart</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
<body>
    
    <?php 
    if($loggedin){
    ?>
    

            <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
              <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
            </div>
            

            <section id="cont" class="cart_table_area p_100">
        	<div class="container" >
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
                                <th scope="col">No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">
                                    <form action="partials/_manageCart.php" method="POST">
                                        <button name="removeAllItem" class="btn btn-primary btn-outline-danger">Remove All</button>
                                        <input type="hidden" name="userId" value="<?php $userId = $_SESSION['userId']; echo $userId ?>">
                                    </form>
                                </th>
							</tr>
						</thead>
						<tbody>

                        <?php
                                $sql = "SELECT * FROM `viewcart` WHERE `userId`= $userId";
                                $result = mysqli_query($conn, $sql);
                                $counter = 0;
                                $totalPrice = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $cakeId = $row['cakeId'];
                                    $Quantity = $row['itemQuantity'];
                                    $mysql = "SELECT * FROM `cake` WHERE cakeId = $cakeId";
                                    $myresult = mysqli_query($conn, $mysql);
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $cakeName = $myrow['cakeName'];
                                    $cakePrice = $myrow['cakePrice'];
                                    $total = $cakePrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;

                                    echo '<tr>
                                            <td><img src="img/cake-'.$cakeId. '.jpg" alt="image for this cake"></td>
                                            <td>' . $cakeName . '</td>
                                            <td>' . $cakePrice . '</td>
                                            <td>
                                                <form id="frm' . $cakeId . '">
                                                    <input type="hidden" name="cakeId" value="' . $cakeId . '">
                                                    <input type="number" name="quantity" value="' . $Quantity . '" class="text-center" onchange="updateCart(' . $cakeId . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                                                </form>
                                            </td>
                                            <td>' . $total . '</td>
                                            <td>
                                                <form action="partials/_manageCart.php" method="POST">
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger">Remove</button>
                                                    <input type="hidden" name="itemId" value="'.$cakeId. '">
                                                </form>
                                            </td>
                                        </tr>';
                                }
                                if($counter==0) {
                                    ?><script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';</script> <?php
                                }
                            ?>


							<tr>
								<td>
									<form class="form-inline"> 
										<div class="form-group"> 
											<input type="text" class="form-control" placeholder="Coupon code">
										</div>
										<button type="submit" class="btn">Apply Coupon</button>
									</form>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								
							</tr>
						</tbody>
					</table>
				</div>
       			<div class="row cart_total_inner">
        			<div class="col-lg-7"></div>
        			<div class="col-lg-5">
        				<div class="cart_total_text">
        					<div class="cart_head">
        						Cart Total
        					</div>
        					<div class="sub_total">
        						<h5>Sub Total <span><?php echo $totalPrice ?> VND</span></h5>
        					</div>
        					<div class="total">
        						<h4>Total <span><?php echo $totalPrice ?> VND</span></h4>
        					</div>
                            <br>
                            <div class="form-check">
                            <input class="total" type="radio" name="flexRadioDefault" checked id="flexRadioDefault1">
                            <label class="total" for="flexRadioDefault1">
                            Cash On Delivery 
                            </label>
                            </div>
                            <br>
                            <div class="form-check">
                            <input class="total" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  disabled>
                            <label class="total" for="flexRadioDefault2">
                            Online Payment
                            </label>
                            </div>
        					<div class="cart_footer">
        						<a class="pest_btn" data-toggle="modal" data-target="#checkoutModal" href="#">Proceed to Checkout</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Cart Table Area =================-->


            
                    
       
                                
    <?php 
    }
    else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Before checkout you need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>
    <?php require 'partials/_checkoutModal.php'; ?>
    <?php require 'partials/_footer.php' ?>
    
    
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
			if (input.value >=50) {
                input.value = 10;
            }
        }
        function updateCart(id) {
            $.ajax({
                url: 'partials/_manageCart.php',
                type: 'POST',
                data:$("#frm"+id).serialize(),
                success:function(res) {
                    location.reload();
                } 
            })
        }
    </script>
</body>
</html>