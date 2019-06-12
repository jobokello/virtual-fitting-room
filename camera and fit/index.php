<?php
    session_start();
    $shopper = $_SESSION['shopperID'];
    $login_user = $_SESSION['shopperUsername'];
  echo $ID = $_GET['id'];
  echo $_SESSION['payID'] = $ID;

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "virtualdressroom";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //items in shopping cart
  $items = '';

  $sql = "SELECT * FROM orders WHERE orderID='$ID'";

  if ($result = mysqli_query($conn, $sql)){

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    $items = $row_cnt;

    $row = mysqli_fetch_array($result);
      //echo $accountID = $row['orderID'];
    if(isset($row['clothID']))
    {
      $_SESSION['clothID'] = $row['clothID'];
    }

    


    
    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>1. Take a photo standing at ease</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { 
            padding:20px; 
            border:1px solid; 
            background:#ccc;
            left: 50px; 
        }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">1. Take a photo standing at ease</h1>
   
    <form method="POST" action="storeImage.php">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <!--<input type=button value="Take Snapshot" onClick="take_snapshot()">-->
                <input type="button" id="takeButton" value="Take Photo"/>
                <div id="autoshootmsg" style="display: none;">
                    <span>Photo will capture in </span>
                    <span id="timer"></span>
                    <span>Seconds</span>
                </div>
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Next</button>
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">

    var timer = null;
    var timeto = 7; // time in seconds to capture
    var countdown = $("#timer").html(timeto);

    $("#takeButton").click(function(e) {
        console.info(this);
        if (timer !== null) {
            // some logic here if autoshoot in progress and user click button again
        } else {
            $("#autoshootmsg").show();
            timer = window.setInterval(function() {
                timeto--;
                countdown.html(timeto);
                if (timeto == 0) {
                    window.clearInterval(timer);
                    timer = null;
                    take_snapshot();                    
                };    
            }, 1000);
        };

    });


    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    //success();

    function success(){
        alert("Photo Taken Successfully Check Before Submitting");
    }
</script>
 
</body>
</html>