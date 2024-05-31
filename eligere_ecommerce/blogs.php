<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="./images/icon.jpg">
    <title>Eligere</title>
</head>

<body>

<section class="blogs" id="blogs">
    <h1>Latest Blogs</h1>

    <div class="container">

      <div class="row">

        <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="./images/images0.jpeg" alt="">
          <div class="card-body">
            <h3>Lorem, ipsum dolor</h3>
            <h5>Admin / 6 January 2023</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quis aperiam magnam nostrum quae distinctio, id minima repellat eveniet quaerat.</p>
            <button id="blogbtn">Read More.</button>
          </div>
        </div>  
        </div>
        <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="./images/images1.jpeg" alt="">
          <div class="card-body">
            <h3>Lorem, ipsum dolor</h3>
            <h5>Admin / 6 February 2020</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quis aperiam magnam nostrum quae distinctio, id minima repellat eveniet quaerat.</p>
            <button id="blogbtn">Read More.</button>
          </div>
        </div>  
        </div>
        <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="./images/images2.jpeg" alt="">
          <div class="card-body">
            <h3>Lorem, ipsum dolor</h3>
            <h5>Admin / 6 March 2020</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quis aperiam magnam nostrum quae distinctio, id minima repellat eveniet quaerat.</p>
            <button id="blogbtn">Read More.</button>
          </div>
        </div>  
        </div>
        
      </div>

    </div>

    <style>
.blogs{
  width: 100%;
  background: #f7f5f2;
}
.blogs h1{
  text-align: center;
  font-size: 30px;
  color: black;
  font-weight: bold;
}
.blogs .container{
  margin-top: 60px;
}
.blogs h5{
  color: #b2744c;
}

#blogbtn{
  width: 200px;
  height: 36px;
  border: none;
  color: white;
  background: #b2744c;
  cursor: pointer;
  border-radius: 10px;
transition: background-color 0.3s ease;
}

#blogbtn:hover {
  background-color: #9a5d3b;
}

.card {
  width: 100%;
  height: 100%;
  border: none;
  border-radius: 0;
  box-shadow: none;
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.card img {
  width: 50%;
  height: 50%;
  object-fit: cover;
  margin: 0 auto;
  border-radius: 10px;
}

.card .card-body {
  padding: 15px;
  text-align: center;
}

.card h3 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 5px;
}

.card h5 {
  font-size: 14px;
  font-weight: normal;
  color: #b2744c;
  margin-bottom: 10px;
}

.card p {
  font-size: 14px;
  line-height: 1.5;
  margin-bottom: 15px;
}
</style>


   </section>
</body>