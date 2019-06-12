<?php
  session_start();
  $shopper = $_SESSION['shopperID'];
  $login_user = $_SESSION['shopperUsername'];
  $testCloth = $_SESSION['clothID'];
  echo $currentOrder = $_SESSION['payID'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "virtualdressroom";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //items in shopping cart
  $items = '';

  $sql = "SELECT * FROM clothesinfo WHERE clothID='$testCloth'";

  if ($result = mysqli_query($conn, $sql)){

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    $items = $row_cnt;

    $row = mysqli_fetch_array($result);
      //echo $accountID = $row['orderID'];
    if(isset($row['image']))
    {
      $myPurchase = $row['image'];
    }
    
    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Metric Room</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="click.js"></script>
</head>
<body>

<div class="container-fluid">
  <h1>Taking body measurements</h1>
  <p>Refer to the object on the right and click on the image</p>
  <div class="row">
    <div class="col-md-8" style="background-color:lavender; height: 500px;">
      <div>
          <img id="myClient" src="../camera and fit/upload/Image_1.png" alt="" />
        </div>
        <div style="padding-top:20px;">
            <div id="coord"></div>
        </div>
    </div>
    <div class="col-md-4" style="background-color:lavenderblush;">
       <img id="mySilo" height="500px" src="../camera and fit/upload/Silo1.jpg">
    </div>
    <div class="clearfix">
      
    </div>
    <div  class="col-md-12" style="background-color:lavenderblush;">
        <h2 style="text-align: center;">Final Body measurements summary</h2>            
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Serial</th>
              <th>Body part</th>
              <th>Measurement in Inches</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Shoulder length</td>
              <td id = "shoulderLength"></td> 
            </tr>
            <tr>
              <td>2</td>
              <td>Arm Length</td>
              <td id = "armLength"></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Upper body height</td>
              <td id = "torsoHeight"></td>
            </tr>
            <tr><td>4</td>
              <td>Waist length</td>
              <td id = "waistLine"></td>
            </tr>
          </tbody>
        </table>

        <div style="text-align: center;s">
          <button type="button" href="" class="btn btn-success" onclick=" relocate()">Confirm Measurements And Make Purchase</button>
        </div>
    </div>
  </div>
</div>

<script>
  function relocate()
  {
    location.href = "../php/insertMetrics.php";
  } 
</script>
    
</body>
</html>
