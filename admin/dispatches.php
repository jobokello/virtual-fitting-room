<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "virtualdressroom";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //items in shopping cart
  $items = '';

  $sql = "SELECT * FROM dispatch";

  if ($result = mysqli_query($conn, $sql)){

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    $items = $row_cnt;

    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Area | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Ivy Designs</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="shoppers.php">Shoppers</a></li>
            <li><a href="designers.php">Designers</a></li>
            <li><a href="transporters.php">Transporters</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="dispatches.php">Dispatches</a></li>
            <li><a href="wages.php">Wages</a></li>
            <li><a href="refunds.php">Refunds</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Welcome, Jobson</a></li>
            <li><a href="pages.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Dashboard  <small>Dispatch Management</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Create Content
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="addShopper.php">Add Shopper</a></li>
              <li><a href="addDesigner.php">Add Designer</a></li>
              <li><a href="addShopper.php">Add Transport Agent</a></li>
            </ul>
          </div>  
          </div>
        </div>
      </div>  
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <!--main area-->
          <div class="col-md-12">

          

          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 style="text-align: center;" class="panel-title">Pending and Confirmed Dispatches</h3>
            </div>
            <div class="panel-body">

              <div class="table-wrapper-scroll-y">

              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">Dispatch Number</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Shipping Fee</th>
                    <th style="text-align: center;" colspan="2 scope="col">Shopper</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Decision Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql1 = "SELECT * FROM dispatch";

                    $result1 = mysqli_query($conn,$sql1);

                    while($row = mysqli_fetch_array($result1)) {     
                      echo "<tr>";
                      echo "<td>".$row['dispatchID']."</td>";
                      echo "<td>".$row['clothName']."</td>";
                      echo "<td>Ksh. ".$row['trpFee']."</td>";

                      $shopperID = $row['shopperID'];

                      $sql2 = "SELECT shopperFname, shopperSname FROM shopperinfo WHERE shopperID = '$shopperID'";

                      $result = mysqli_query($conn,$sql2);

                      while($row3 = mysqli_fetch_array($result)) {
                        echo "<td>".$row3['shopperFname']."</td>";
                     
                        echo "<td>".$row3['shopperSname']."</td>";
                      }

                      echo "<td>".$row['deliveryStatus']."</td>";       
                      echo "<td><button style='margin:5px' type='button' class='btn btn-success btn-block'><a style='text-decoration: none; color: white;' href=\"editDispatches.php?id=$row[dispatchID]\">Edit</a></button> 
                      <button style='margin:5px' type='button' class='btn btn-danger btn-block center-blocks'><a style='text-decoration: none; color: white;' href=\"deleteDispatches.php?id=$row[dispatchID]\" onClick=\"return confirm('Are you sure you want to cancel the order placed by the client?')\">Delete</a></button></td>";
                      echo "</tr>";   
                    }
                  ?>
                                   
                </tbody>
              </table>

            </div>

            </div>
          </div>         
          </div>
          
        </div>
        
      </div>
      
    </section>

   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/table.js"></script>
   
  </body>
</html>