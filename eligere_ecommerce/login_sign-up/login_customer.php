
<!DOCTYPE html>
<html lang="en">

   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="../images/icon.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sign-up.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title>Login Form</title>
   </head>

    <body>
      <div class="nav_menu">
        <div class="logo" style="position: absolute; left: 0; top: 0;" >
          <img src="../images/logo.png" width="180px" height="80px" style="margin-left: 10px;">
        </div>
        <ul>
           <li><a href="../index.php" class="link">Home</a></li>
           <li><a href="../about.php" class="link">About Us</a></li>
           <li><a href="../contactUs.php" class="link">Contact Us</a></li>
           <li><a href="sign-up.php" class="link">Sign-up</a></li>
        </ul>
     </div>
      <div class="wrapper">
          <form action="login_process.php" method="POST">
              <h1>Login</h1>
              <div class = "input-box">
                <input type = "text" name="username" placeholder="Username" required>
                <i class="bi bi-person-fill"></i>
              </div>
              <div class = "input-box">
                <input type = "text" name="user_password" placeholder="Password" required>
                <i class="bi bi-lock-fill"></i>
              </div>
             <div class="remember-forgot">
                <label> <input type = "checkbox">Remember Me</label>
                <a href="#">Forgot Password</a>
             </div>
             <button type="submit" class="button">Login</button>
             <div class="register-link">
               <p>Don't have an account? <a href ="sign-up.php">Sign-up</a></p>
             </div>
          </form>
      </div>

    </body>


</html> 