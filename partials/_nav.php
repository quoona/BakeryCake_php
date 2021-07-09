<?php session_start();
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

echo '
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        
        <title>Cake - Bakery</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        
    </head>
    <body>
        
        <!--================Main Header Area =================-->
    <header class="main_header_area">
      <div class="top_header_area row m0">
        <div class="container">
          <div class="float-left">
            <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
            <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@cakebakery.com</a>
          </div>
          <div class="float-right">
            <ul class="h_social list_style">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
            <ul class="h_search list_style">';
        $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
        $countresult = mysqli_query($conn, $countsql);
        $countrow = mysqli_fetch_assoc($countresult);      
        $count = $countrow['SUM(`itemQuantity`)'];
        if(!$count) {
          $count = 0;
        }
        echo '
       <li ><a href="viewCart.php"><i class="lnr lnr-cart">(' .$count. ')</i></a></li>';
      //  type="search" name="search"
        echo'


              
              <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="main_menu_two">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="./index.php"><img src="img/logo-2.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="my_toggle_menu">
                              <span></span>
                              <span></span>
                              <span></span>
                            </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav justify-content-end">
              <li><a href="./index.php">Home</a></li>
                
                <li><a href="./ourcake.php">Our Cakes</a></li>
                <li><a href="./menu.php">Menu</a></li>
                
                <li><a href="./about.php">About Us</a></li>
                    
                
                
                    <li><a href="./shop.php">Shop</a></li>
                    
                <li><a href="contact.php">Contact Us</a></li>
                
                
                

                ';
                
                



                if($loggedin){
                  echo '<li class="dropdown submenu">
                    
                      <a class=" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Welcome ' .$username. '</a>
                      <ul class="dropdown-menu">
                      <li><a href="./viewOrder.php">View Order</a></li>
                        <li><a href="partials/_logout.php">Logout</a></li>
                       
                        

                        </ul>
                    
                  
                  
                    
                 ';
                }
                else {
                  echo '
                  <li><a data-toggle="modal" data-target="#loginModal" href="#">Login</a></li>
                  <li><a data-toggle="modal" data-target="#loginModal" href="#">SignUp</a></li>

                  ';
                }

                if($loggedin){
                  echo '
                        <li><a href="viewProfile.php"><img src="img/person-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.jpg\'" style="width:30px; height:30px"></a></li> 
                 ';
                }

   
                echo'
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
        

';




// echo'

// <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
//       <a class="navbar-brand" href="index.php">'.$systemName.'</a>
//       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//         <span class="navbar-toggler-icon"></span>
//       </button>

//       <div class="collapse navbar-collapse" id="navbarSupportedContent">
//         <ul class="navbar-nav mr-auto">
//           <li class="nav-item active">
//             <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
//           </li>
//           <li class="nav-item dropdown">
//             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//               Top Categories
//             </a>
//             <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
//             $sql = "SELECT categorieName, categorieId FROM `categories`"; 
//             $result = mysqli_query($conn, $sql);
//             while($row = mysqli_fetch_assoc($result)){
//               echo '<a class="dropdown-item" href="viewPizzaList.php?catid=' .$row['categorieId']. '">' .$row['categorieName']. '</a>';
//             }
//             echo '</div>
//           </li>
//           <li class="nav-item">
//             <a class="nav-link" href="viewOrder.php">Your Orders</a>
//           </li>
//           <li class="nav-item">
//             <a class="nav-link" href="about.php">About Us</a>
//           </li>
//           <li class="nav-item">
//             <a class="nav-link" href="contact.php">Contact Us</a>
//           </li>
          
//         </ul>
//         <form method="get" action="/cake/search.php" class="form-inline my-2 my-lg-0 mx-3">
//           <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search" required>
//           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
//         </form>';

//         $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
//         $countresult = mysqli_query($conn, $countsql);
//         $countrow = mysqli_fetch_assoc($countresult);      
//         $count = $countrow['SUM(`itemQuantity`)'];
//         if(!$count) {
//           $count = 0;
//         }
//         echo '<a href="viewCart.php"><button type="button" class="btn btn-secondary mx-2" title="MyCart">
//           <svg xmlns="img/cart.svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
//             <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
//           </svg>  
//           <i class="bi bi-cart">Cart(' .$count. ')</i>
//         </button></a>';

//         if($loggedin){
//           echo '<ul class="navbar-nav mr-2">
//             <li class="nav-item dropdown">
//               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' .$username. '</a>
//               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
//                 <a class="dropdown-item" href="partials/_logout.php">Logout</a>
//               </div>
//             </li>
//           </ul>
//           <div class="text-center image-size-small position-relative">
//             <a href="viewProfile.php"><img src="img/person-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.jpg\'" style="width:40px; height:40px"></a>
//           </div>';
//         }
//         else {
//           echo '
//           <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#loginModal">Login</button>
//           <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#signupModal">SignUp</button>';
//         }
            
//   echo '</div>
//     </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<script>alert("Thank you, now you can login");
      window.location.href="http://localhost/cake/index.php";  
      </script>';
      exit();
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<script>alert("Sorry, sumthing went wrong");
      window.location.href="http://localhost/cake/index.php";  
      </script>';
      exit();
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<script>alert("Sorry, sumthing went wrong");
      window.location.href="http://localhost/cake/index.php";  
      </script>';
      exit();
    }









?>

