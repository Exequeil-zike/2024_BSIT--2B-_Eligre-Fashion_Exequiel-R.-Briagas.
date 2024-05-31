<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
    <link rel="icon" type="image" href="./images/icon.jpg">
    <title>Eligere</title>
</head>

<body>
  <div class="main">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" id="logo"><img src="./images/logo.png" width="125px" height="55px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa-solid fa-bars" style="color: white; font-size: 23px;"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactUs.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blogs.php">Blogs</a>
              </li>
            </ul>
            <div class="icons_links">
              <button id="Login"><a href="./login_sign-up/login_customer.php">Login</a></button>
              <button id="Sign-up"><a href="./login_sign-up/sign-up.php">Sign-up</a></button>
            </div>
          </div>
        </div>
      </nav>

   <!--home section-->
   <section id="home">
     <div class="content">
       <h3>Discover Your Elegance With <br> Eligere Jewelry</h3>
       <p>Step into a world of timeless elegance.<br> Our exquisite pieces are designed to elevate your style,<br> offering a touch of sophistication that captivates the senses 
        <br> Discover the essence of elegance and make every moment unforgetable</p>
        <button id="btn">Shop Now</button>
     </div>
   </section>

   <!---about section-->
   <section id="about">
       <div class="container">
         <div class="heading">About Us</div>
         <div class="row">
            <div class="col-md-6">
                <div class="card">
                  <img src = "./images/jewels.jpg">
                </div>
            </div>

            <div class="col-md-6">
               <h3>What Makes Our Jewelry Special?</h3>
               <p>Our jewelry stands as a testament to elegance and individuality, crafted from the finest gold and imbued with a sense of timeless allure. Each piece bears the mark of exclusivity, meticulously designed to reflect the wearer's distinct personality.
                 <br><br>Founded in 2023, our brand has swiftly become synonymous with sophistication and innovation in the world of fine jewelry. From intricate designs inspired by nature to bold statement pieces that exude confidence, every creation is a masterpiece in its own right. Embracing the essence of luxury and craftsmanship, our jewelry captures moments and memories, becoming cherished heirlooms for generations to come.
               </p>
               <a href="about.php"><button id="about_btn">Learn More</button></a>
            </div>
         </div>
       </div>
   </section>


    <!----Product section------>
    <section id="top-cards">
      <h1 class="heading">Featured Products</h1>
      <div class="container">
        <div class="row">

          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/florence.jpg" class="card-img">
              <div class="card-info">
                   <h5 class="card-name">Florence</h5>
                   <p class="card-price">₱ 5000.00</p>
                   <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
                   style="color: white; text-decoration: none;">
                   Log-in to buy</a>
                  </button>
            </div>
          </div>
        </div>

<div class="col-md-4 py-3 py-md-0">
  <div class="card">
    <img src="./images/hermione.jpg" class="card-img">
    <div class="card-info">
         <h5 class="card-name">Hermione</h5>
         <p class="card-price">₱ 6000.00</p>
         <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
                   style="color: white; text-decoration: none;">
                   Log-in to buy</a>
         </button>
  </div>
</div>
</div>

<div class="col-md-4 py-3 py-md-0">
  <div class="card">
    <img src="./images/aneri.jpg" class="card-img">
    <div class="card-info">
         <h5 class="card-name">Aneri</h5>
         <p class="card-price">₱ 6000.00</p>
         <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
                   style="color: white; text-decoration: none;">
                   Log-in to buy</a>
         </button>
  </div>
</div>
</div>

    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="./images/dainty.jpg" class="card-img">
        <div class="card-info">
             <h5 class="card-name">Dainty</h5>
             <p class="card-price">₱ 5000.00</p>
             <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
                   style="color: white; text-decoration: none;">
                   Log-in to buy</a>
             </button>
      </div>
    </div>
  </div>

  <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="./images/yves.jpg" class="card-img">
        <div class="card-info">
             <h5 class="card-name">Yves</h5>
             <p class="card-price">₱ 5000.00</p>
             <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
                   style="color: white; text-decoration: none;">
                   Log-in to buy</a>
             </button>
      </div>
    </div>
  </div>

  
  <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="./images/solitaire.jpg" class="card-img">
        <div class="card-info">
             <h5 class="card-name">Solitaire</h5>
             <p class="card-price">₱ 5000.00</p>
             <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
                   style="color: white; text-decoration: none;">
                   Log-in to buy</a>
             </button>
      </div>
    </div>
  </div>



    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="./images/coquette.jpg" class="card-img">
        <div class="card-info">
             <h5 class="card-name">Coquette</h5>
             <p class="card-price">₱ 5000.00</p>
             <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
                   style="color: white; text-decoration: none;">
                   Log-in to buy</a>
             </button>
      </div>
    </div>
  </div>

<div class="col-md-4 py-3 py-md-0">
<div class="card">
<img src="./images/infinity.jpg" class="card-img">
<div class="card-info">
   <h5 class="card-name">Infinite</h5>
   <p class="card-price">₱ 1000.00</p>
   <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
           style="color: white; text-decoration: none;">
           Log-in to buy</a>
  </button>
</div>
</div>
</div>

<div class="col-md-4 py-3 py-md-0">
<div class="card">
<img src="./images/shinzo.jpg" class="card-img">
<div class="card-info">
   <h5 class="card-name">Heart</h5>
   <p class="card-price">₱ 3000.00</p>
   <button class="btn-add-to-cart"><a href="./login_sign-up/login_customer.php" 
           style="color: white; text-decoration: none;">
           Log-in to buy</a>
   </button>
</div>
</div>
</div>



      </div>
    </div>
 </section>


<!-------footer------>
 <footer id="footer">
    <div class="footer-logo text-center"><img src="./images/logo.png" alt="logo"></div>
    <div class="social-links text-center">
      <i class="bi bi-twitter-x"></i>
      <i class="bi bi-facebook"></i>
      <i class="bi bi-instagram"></i>
      <i class="bi bi-youtube"></i>
      <i class="bi bi-pinterest"></i>
    </div>

    <div class="copyright text-center">
      &copy; Copyright <strong><span>Eligere Group_BSIT-2B</span></strong>. All Rights Reserved
  </div>
</footer>

  <style>
   #footer{
  width: 100%;
  background: #a37251;
  margin-top: 60px;
}
.footer-logo img{
  width: 150px;
  border-radius: 10px;
  margin-top: 5px;
  cursor: pointer;
}
#footer .social-links i{
  font-size: 17px;
  margin-left: 5px;   
  padding: 2px;
  background: none;
  color: black;
  cursor: pointer;
}
.copyright{
  color: black;
  margin-bottom: 10px;
}
  </style>
   



    </div>
   <script src="js/bootstrap.min.js"></script>
   <script>
    document.getElementById('btn').addEventListener('click', function() {
        document.getElementById('top-cards').scrollIntoView({ behavior: 'smooth' });
    });
</script>

 </body>
   
</html>

