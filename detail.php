<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">

<head>
    <title>BookStore :: Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- nav bar- classes -->
<nav class="navbar navbar-expand-sm bg-secondary navbar-secondary pl-5 mb-0" style="border-radius: 0%;">
        <a class="navbar-brand text-white" href="home.php"  style="font-size: 25px;">The Nazeem Booktown</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          
        </div>
  
            <ul class="nav navbar-nav">
            <ul class="navbar-nav">
                <li class="nav-item pr-5 font-weight-bold text-uppercase" style="font-size: 18px;">
                    <a class="nav-link text-white" href="home.php">Home</a>
                </li>
              
            </ul>
                <li class="nav-item pl-5 font-weight-bold text-uppercase" style="font-size: 18px;">
                    <a class="nav-link text-white" href="store.php">Store</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- PHP code below -->
    <?php
    session_start();
    require("mysqli_connect.php");
    $_SESSION['id'] = $_REQUEST['id'];
    // sessions
    $joinQuery = "SELECT books.bookid, booktitle, publishdate, price, description, coverimage, author, publisher, edition, category, stock FROM books INNER JOIN bookinventory ON  books.bookid = bookinventory.bookid WHERE books.bookid = " . $_SESSION["id"];
    $result = mysqli_query($connection, $joinQuery);
    $rows = mysqli_fetch_assoc($result);
    $_SESSION['price'] = $rows['price'];

    // using if else and pasing conditions
    if ($rows['stock'] <= 0) {
        $stock = "<h4 class='text-danger'><i class='fa-solid fa-circle-exclamation'></i> Out of stock </h5>";
        $stockcounter = "";
        $button = "<button type='submit' class='btn btn-lg btn-primary mt-5' disabled='disabled'>Buy Now</button>";
    } else if ($rows['stock'] <= 10) {
        $stock = "<h4 class='text-warning'><i class='fa-solid fa-circle-exclamation'></i> Low on stock </h4>";
        $stockcounter = "<h4 class='text-danger'> Only {$rows['stock']} in stock. </h4>";
        $button = "<button type='submit' class='btn btn-lg btn-dark mt-5'>Buy Now</button>";
    } else {
        $stock = "<h4 class='text-secondary'><i class='fa-solid fa-circle-check fa-sm'></i> Available </h4>";
        $stockcounter = "<h4 class='text-danger'>  {$rows['stock']} in stock. </h4>";
        $button = "<button type='submit' class='btn btn-lg btn-dark mt-5'>Buy Now</button>";
    }
    echo "<div class='breadcrumbs'>
                <ol class='items' style='list-style: none; margin-top:10px;'>
                    <li class='breadcrumb-item' style='font-size: 20px;'>
                        <a href='store.php'>Store</a>
                        <strong class='breadcrumb-item'> / {$rows['booktitle']}</strong>
                    </li>
                </ol>
            </div>";

    echo "<form action='checkout.php' method='POST'>
            <div class='row  d-flex justify-content-center'>
                <div class='col-4 mt-5 ml-5 mb-5'>
                    <div class='profile-img '>
                        <img src='image/{$rows['coverimage']}' alt='Book image' style ='width:100%; height:600px;'/>
                    </div>
            
                <div class=' mt-4 ml-4'>
              <span>
    <ul class='pl-0' style='list-style-type: none;'>
        <li>
            <h1>{$rows['booktitle']}</h1>
        </li>
        <li>
            <h4><span style='color:gray;'>Written by:</span> {$rows['author']}</h4>
        </li>
        <li>
            <h4><span style='color:gray;'>Publisher:</span> {$rows['publisher']}</h4>
        </li>
        <li>
            <h4><span style='color:gray;'>Edition:</span> {$rows['edition']}</h4>
        </li>
        <li>
            <h4><span style='color:gray;'>Published on:</span> {$rows['publishdate']}</h4>
        </li>
        <li>
            <h4><span style='color:gray;'>Category:</span> {$rows['category']}</h4>
        </li>
        <li>
            <h4><span style='color:gray;'>Description:</span> {$rows['description']}</h4>
        </li>
        <li>
            <h2 class='text-dark'>$ {$rows['price']}</h2>
        </li>
        <li>
            $stock
        </li>
        <li>
            $stockcounter
        </li>
        <li>
            <h4>Quantity</h4>
            <select class='dropdown' name='qty'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
            </select>
        </li>
        <li>
            $button
        </li>
          </ul>
        <span>
    </div>
    </div>
</div>
        </form>";
    ?>


   <!-- Footer -->
   <footer class="bg-secondary text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->

   

    <!-- Section-- chek with the text -->
    <section class="mb-4 lead">
      <p>
      No matter what you’re a fan of, from Fiction to Biography, Sci-Fi, Mystery, YA, M
       and more, The Nazeem Booktown has the perfect book for you. Shop bestselling books from the NY Times Bestsellers list, or get personalized recommendations to find something new and unique!
      </p>
    </section>
    <!-- Section: Text -->
 <!-- Section: Form -->
 <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2 lead">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example21" class="form-control" />
              <label class="form-label lead" for="form5Example21">Email address</label>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light lead">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->
    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h4 class="text-uppercase fw-bold text-white">Services</h4>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Publisher & Author Guidlines</a>
            </li>
            <li>
              <a href="#!" class="text-white $font-weight-bold">Affiliate Program</a>
            </li>
            <li>
              <a href="#!" class="text-white"> Our Bookfairs</a>
            </li>
            <li>
              <a href="#!" class="text-white">Our Educators</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h4 class="text-uppercase">About us</h4>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">About store</a>
            </li>
            <li>
              <a href="#!" class="text-white">Careers</a>
            </li>
            <li>
              <a href="#!" class="text-white">kitchen</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h4 class="text-uppercase">Shop by category</h4>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Fiction </a>
            </li>
            <li>
              <a href="#!" class="text-white">Non Fiction</a>
            </li>
            <li>
              <a href="#!" class="text-white">kids</a>
            </li>
            <li>
              <a href="#!" class="text-white">ebooks</a>
            </li>
            <li>
              <a href="#!" class="text-white">teens</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h4 class="text-uppercase ">Quick Help</h4>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Help Center</a>
            </li>
            <li>
              <a href="#!" class="text-white">Covid Safety</a>
            </li>
            <li>
              <a href="#!" class="text-white">Shipping and returns</a>
            </li>
            <li>
              <a href="#!" class="text-white">Order Status</a>
            </li>
            <li>
              <a href="#!" class="text-white">Gift Cards</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center lead" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="home.php">TheNazeemBooktown.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</body>

</html>