<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">

<head>
    <title>BookStore :: Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-secondary navbar-secondary pl-5 mb-0" style="border-radius: 0%;">
        <a class="navbar-brand text-white" href="home.php"  style="font-size: 25px;">The Nazeem Booktown</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          
        </div>
            <!-- NAV_BARR -->
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

    <!-- php session -->
    <?php
    session_start();
    require("mysqli_connect.php");

    // Using function  and assigning values
    function filterStr($str)
    {
        $str = filter_var(trim($str), FILTER_UNSAFE_RAW);

        if (filter_var($str, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]{3,20}$/")))) {
            return $str;
        } else {
            return FALSE;
        }
    }
    // another function
    function filterEmail($email)
    {

        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        } else {
            return FALSE;
        }
    }

    // variables
    $firstNameErr = "";
    $lastNameErr = "";
    $emailErr = "";
    $addressErr = "";
    $cityErr = "";
    $stateErr = "";
    $countryErr = "";
    $postalcodeErr = "";

    // fetching values and using if else conidtion
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['qty'])) {
            $qty = $_POST['qty'];
            $_SESSION['qty'] = $_POST['qty'];
            $qty = $_SESSION['qty'];
        }

        $totalPrice = $_SESSION['qty'] * $_SESSION['price'];

        if (empty($_POST["firstname"]) || !filterStr($_POST["firstname"])) {
            $firstNameErr = "<span style=color:red;> * First name is required.<br> </span>";
        }

        if (empty($_POST["lastname"]) || !filterStr($_POST["lastname"])) {
            $lastNameErr = "<span style=color:red;> * Last name is required.<br> </span>";
        }

        if (empty($_POST["email"]) || !filterEmail($_POST["email"])) {
            $emailErr = "<span style=color:red;> * Email is required.<br> </span>";
        }

        if (empty($_POST["address"])) {
            $addressErr = "<span style=color:red;> * Address is required.<br> </span>";
        }

        if (empty($_POST["city"]) || !filterStr($_POST["city"])) {
            $cityErr = "<span style=color:red;> * City is required.<br> </span>";
        }

        if (empty($_POST["state"]) || !filterStr($_POST["state"])) {
            $stateErr = "<span style=color:red;> * State is required.<br> </span>";
        }

        if (empty($_POST["country"]) || !filterStr($_POST["country"])) {
            $countryErr = "<span style=color:red;> * Country is required.<br> </span>";
        }

        if (empty($_POST["postalcode"])) {
            $postalcodeErr = "<span style=color:red;> * Postal code is required.<br> </span>";
        }

        // validations and checking if the  value is entered or  not
        if (empty($firstNameErr) && empty($lastNameErr) && empty($email) && empty($addressErr) && empty($cityErr) && empty($stateErr) && empty($countryErr) && empty($postalcodeErr)) {

            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $paymentmethod = mysqli_real_escape_string($connection, $_POST["payment"]);
            $firstName = mysqli_real_escape_string($connection, $_POST["firstname"]);
            $lastName = mysqli_real_escape_string($connection, $_POST["lastname"]);
            $address = mysqli_real_escape_string($connection, $_POST["address"]);
            $city = mysqli_real_escape_string($connection, $_POST["city"]);
            $state = mysqli_real_escape_string($connection, $_POST["state"]);
            $country = mysqli_real_escape_string($connection, $_POST["country"]);
            $postalcode = mysqli_real_escape_string($connection, $_POST["postalcode"]);
            $bookid = $_SESSION["id"];
            $qty = $_SESSION["qty"];
            $date = date('Y-m-d');

            $insertQuery = "INSERT INTO bookdb.order (bookid, order_date, email, quantity, total, paymentmethod, firstname, lastname, address, city, state, country, postalcode) VALUES ($bookid, '$date', '$email', $qty, $totalPrice, '$paymentmethod', '$firstName', '$lastName', '$address', '$city', '$state', '$country', '$postalcode')";

            if (mysqli_query($connection, $insertQuery)) {
                $updateStockQuery = "UPDATE bookinventory SET stock = stock - " . $_SESSION['qty'] . " WHERE bookid = $bookid";
                $updateresult = mysqli_query($connection, $updateStockQuery);

                $updateStockPriceQuery = "UPDATE bookinventory SET totalprice = stock * " . $_SESSION['price'] . "WHERE bookid = $bookid";
                $updateresult2 = mysqli_query($connection, $updateStockPriceQuery);
                header('Location:home.php');
            } else {
                echo 'Try again<br>' . mysqli_error($connection);
            }
        }
    }
    ?>
    <!-- html for payment section -->
    <h2 style="text-align: center;">Payment Details</h2>
    <div class="container" style="margin: 20px 0px 50px 420px;">
        <form class ="well form-horizontal"method="POST" action="checkout.php">
            <div class="form-row pl-5">
                <div class="form-group col-md-3">
                    <label>First Name</label>
                    <input id="input" type="text" class="form-control" name="firstname" placeholder="First name" size="20" maxlength="40" value="<?php if (isset($_POST["firstname"])) echo $_POST["firstname"]; ?>"><span><?php echo $firstNameErr; ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Last Name</label>
                    <input id="input" type="text" class="form-control" name="lastname" placeholder="Last name" size="20" maxlength="40" value="<?php if (isset($_POST["lastname"])) echo $_POST["lastname"]; ?>"><span><?php echo $lastNameErr; ?>
                </div>
            </div>

            <div class="form-row pl-5">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input id="input" type="email" class="form-control" name="email" placeholder="Email" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>"><span><?php echo $emailErr; ?>
                </div>
            </div>

            <div class="form-row pl-5">
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <input id="input" type="text" class="form-control" name="address" placeholder="1234 Main St" value="<?php if (isset($_POST["address"])) echo $_POST["address"]; ?>"><span><?php echo $addressErr; ?>
                </div>
            </div>

            <div class="form-row pl-5">
                <div class="form-group col-md-3">
                    <label>City</label>
                    <input id="input" type="text" class="form-control" name="city" placeholder="City" value="<?php if (isset($_POST["city"])) echo $_POST["city"]; ?>"><span><?php echo $cityErr; ?>
                </div>
                <div class="form-group col-md-3">
                    <label>State</label>
                    <input id="input" type="text" class="form-control" name="state" placeholder="State" value="<?php if (isset($_POST["state"])) echo $_POST["state"]; ?>"><span><?php echo $stateErr; ?>
                </div>
            </div>
            <div class="form-row pl-5">
                <div class="form-group col-md-3">
                    <label>Country</label>
                    <input id="input" type="text" class="form-control" name="country" placeholder="Country" value="<?php if (isset($_POST["country"])) echo $_POST["country"]; ?>"><span><?php echo $countryErr; ?>
                </div>
                <div class="form-group col-md-3">
                    <label>Postal Code</label>
                    <input id="input" type="text" class="form-control" name="postalcode" placeholder="Postal code" value="<?php if (isset($_POST["postalcode"])) echo $_POST["postalcode"]; ?>"><span><?php echo $postalcodeErr; ?>
                </div>
            </div>

            <div class="form-row pl-5">
                <label>Payment method</label>

                <div class="custom-control custom-radio custom-control-inline">
                    <input id="input" class="form-check-input" type="radio" name="payment" value="card" checked>
                    <label class="form-check-label" style="margin-left: 20px;">Credit card/Debit card</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input id="input" class="form-check-input" type="radio" name="payment" value="cash">
                    <label class="form-check-label" style="margin-left: 20px;">Cash on delivery</label>
                </div>
            </div>
            <input style="margin-left:30px; width:75px; height:30px; " type="submit" value="submit" />
        </form>
    </div>
   
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

   

    <!-- Section: Text -->
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
<script>
</script>

</html>