<?php
  session_start();
  echo $shopper = $_SESSION['shopperID'];
  echo $login_user = $_SESSION['shopperUsername'];
  echo $testCloth = $_SESSION['clothID'];
  echo $currentOrder = $_SESSION['payID'];
  echo $m1 = $_GET['m1'];
  echo $m2 = $_GET['m2'];
  echo $m3 = $_GET['m3'];
  echo $m4 = $_GET['m4'];

  echo "<br>";

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "virtualdressroom";

  

  //echo $shoulder = $_POST['postmyShoulder']; 
  //echo $arm = $_POST['postmyArm']; 
  //echo $torso = $_POST['postmyTorso']; 
  //echo $waist = $_POST['postmyWaist'];




  //echo "<br>";
  //echo $armLength = $_COOKIE['finalArmLength'];;
  //echo "<br>";
  ///echo $shoulderToWaist = $_COOKIE['finalShoulderToWaist'];;
  //echo "<br>";
  //echo $waist = $_COOKIE['finalWaistCircumference'];;

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //items in shopping cart
  $sql = "UPDATE orders SET shoulder ='$m1', arm = '$m2', torso = '$m3', waist = 'm4' WHERE orderID = '$currentOrder'";

  if (mysqli_query($conn, $sql)) {
      //echo "Record updated successfully";
    header("Location: shopperPayment.php");
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  } 

?>