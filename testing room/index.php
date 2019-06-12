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
<html>
<head>
	<style type="text/css">
		body {
		  background-image: url("../camera and fit/upload/image_1.png");
		  background-repeat: no-repeat;
		  background-position: center;
		  background-attachment: fixed;
		  background-size: 30%;
		}
	</style>
	<title>tryon Room</title>
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

	<link rel="stylesheet" type="text/css" href="tryon.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#wrapper').draggable();
  			$('#image').resizable(
  				{
  					handles: 'ne, se, sw, nw'
				}
			);
		});
	</script>
<body>

	<?php
	echo "<div id='wrapper' style='display:inline-block'>";
  		echo "<img id='image' height='250px' width='250px' src='../uploads/".$row['image']."' />";
	echo "</div>";
	?>

	
	<button type="button" href="" class="btn btn-success" onclick=" relocate()">Get Body Measurements</button>

	<script>
		function relocate()
		{
		     location.href = "../metric-room/index.php";
		} 
	</script>
	

</body>
</html>