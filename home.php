<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- link towards type -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
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
            <!-- LISTS -->
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
<div>
    <img class="bg-image img-fluid w-100 p-3" src="Image/banner.png" />
</div>
<div>
    <img class="bg-image img-fluid w-100 mt-2 mb-2 p-3" src="Image/banner2.jpg" />
</div>
<div class="container  text-primary display-1 center" > Our Best seller Books of this summer</div>
  
 
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
          <!-- Image tag -->
          <img src="Image/Everything.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <!-- lil' description -->
            <p>Everything Happens for a Reason is Kate Bowlers memoirs of her experiences after being diagnosed with stage IV colon cancer. As a divinity professor, she has a difficult time integrating this personal tragedy into the narrative of her life.</p>
          </div>
        </a>
      </div>
    </div>
    <!-- description and classes -->
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="Image/thepowerofsubconcious.jpg" target="_blank">
          <img src="Image/thepowerofsubconcious.jpg" alt="Nature" style="width:100%">
          <div class="caption">
            <p>The Power of Your Subconscious Mind explains how to access the potential of the subconscious mind. Accessing our subconscious mind can make us happier and wiser. It has the potential to lower mortality rates. It can also help you make money and assist you in finding the love of your life</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail ">
        <a href="Image/Thesecret.jpg" target="_blank">
          <img src="Image/Thesecret.jpg" alt="Fjords" style="width:100%">
          <div class="caption "><br><br>
            <p>The Secret is a self-help book by Rhonda Byrne that explains how the law of attraction, which states that positive energy attracts positive things into your life, governs your thinking and actions, and how you can use the power of positive thinking to achieve anything you can imagine.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
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

</html>
