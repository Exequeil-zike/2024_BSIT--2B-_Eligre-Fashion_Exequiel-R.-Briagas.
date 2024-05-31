<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="./images/icon.jpg">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
    <title>Eligere</title>
</head>

<body>
<div class="contact-container">
  <div class="contact-wrap">
    <div class="contact-details">
      <div class="col-md-7">
        <div class="heading6">Contact Us</div>
        <p><i class="bi bi-envelope"></i> eligere@gmail.com</p>
        <p><i class="bi bi-phone"></i> 0924681012</p>
        <p><i class="bi bi-building"></i> Eligere Philippines</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, culpa</p>
      </div>
    </div>
    <div class="image">
      <img src="./images/contact.png" alt="contact">
    </div>
  </div>
</div>

<style>
  body{
    font-family: "Merriweather", serif;
  }
  .contact-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f5f5f5;
  }

  .contact-wrap {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .contact-details {
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .heading6 {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 10px;
    color: black;
  }

  .contact-details p {
    margin-bottom: 10px ;
    font-size: 20px;
  }

  .image {
    width: 40%;
    margin-left: 100px;
  }

  .image img {
    width: 100%;
    height: auto;
  }
</style>
    
</body>