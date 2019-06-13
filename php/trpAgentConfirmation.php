<?php
	session_start();
	$disID = $_GET['id'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "virtualdressroom";

	  // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	//select agent and shopper IDs
   	$sql = "SELECT * FROM dispatch WHERE dispatchID ='$disID'";

   	$result = mysqli_query($conn,$sql);

	if (mysqli_query($conn, $sql)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row = mysqli_fetch_array($result);
    	echo $orderID = $row['orderID'];
    	echo '<br> this the order id<brs>';
    	echo $trpFee = $row['trpFee'];
    	echo '<br>';
    	echo $shopperID = $row['shopperID'];
    	echo '<br>';
    	echo $trpAgentID = $row['trpAgentID'];
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	//fetching Agent info
	$sql1 = "SELECT * FROM trpagentinfo WHERE trpAgentID ='$trpAgentID'";

   	$result1 = mysqli_query($conn,$sql1);

	if (mysqli_query($conn, $sql1)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row1 = mysqli_fetch_array($result1);

    	echo $_SESSION['agentFname'] = $trpAgentFname = $row1['trpAgentFname'];
    	echo '<br>';
    	echo $_SESSION['agentSname'] = $trpAgentSname = $row1['trpAgentSname'];
    	echo '<br>';
    	echo $_SESSION['agentEmail'] = $trpAgentEmail = $row1['trpAgentEmail'];
    	echo '<br>';
    	echo $_SESSION['agentPhonenumber'] = $trpAgentPhonenumber = $row1['trpAgentPhonenumber'];
    	echo '<br>';
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
	}

	//fetching shopper info
	$sql2 = "SELECT shopperFname, shopperSname, shopperEmail FROM shopperinfo WHERE shopperID ='$shopperID'";

   	$result2 = mysqli_query($conn,$sql2);

	if (mysqli_query($conn, $sql2)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row2 = mysqli_fetch_array($result2);

    	echo $_SESSION['shopFname'] = $shopperFname = $row2['shopperFname'];
    	echo '<br>';
    	echo $_SESSION['shopSname'] = $shopperFname = $row2['shopperSname'];
    	echo '<br>';
    	echo $_SESSION['shopEmail'] = $shopperEmail = $row2['shopperEmail'];
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
	}

	//confirm delivery status in dispatch table
	$sql3 = "UPDATE dispatch SET deliveryStatus = 'confirmed' WHERE dispatchID = '$disID'";

	if (mysqli_query($conn, $sql3)) 
	{
	    echo "Record updated successfully in dispatch table";
	} 
	else 
	{
	    echo "Error updating record: " .$sql3. mysqli_error($conn);
	}


	//confirm delivery status in orders table
	$sql4 = "UPDATE orders SET trpAgentID = '$trpAgentID', trpFee = '$trpFee', trpAgentStatus = 'confirmed' WHERE orderID = '$orderID'";

	if (mysqli_query($conn, $sql4)) 
	{
	    echo "<br>confirmed now update wages table";
	} 
	else 
	{
	    echo "Error updating record: " . mysqli_error($conn);
	}

	//get all order info
	$sql5 = "SELECT * FROM orders WHERE orderID = $orderID";

   	$result5 = mysqli_query($conn,$sql5);

	if (mysqli_query($conn, $sql5)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row5 = mysqli_fetch_array($result5);

    	echo $_SESSION['finalOrderID'] = $lastorderID = $row5['orderID'];
    	echo '<br>found order id';
    	echo $_SESSION['finaldesignerID'] = $lastdesignerID = $row5['designerID'];
    	echo '<br>found designer';
    	echo $lasttrpAgentID = $row5['trpAgentID'];
    	echo '<br> found agent';
    	echo $_SESSION['finalAgentWage'] = $trpAgentWage = $row5['trpFee'];
    	echo '<br> found agent wage';
    	echo $_SESSION['finaldesignerWage'] = $designerWage = $row5['orderPrice'];
    	echo '<br> found agent wage';
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
	}

	$sql6 = "INSERT INTO wages (orderID, designerID, trpAgentID, trpAgentWage, designerWage) VALUES ('$lastorderID', '$lastdesignerID', '$lasttrpAgentID', '$trpAgentWage', '$designerWage')";

	if (mysqli_query($conn, $sql6)) {
	    echo "New record created successfully";

		    //fetching Agent info
		$sql7 = "SELECT * FROM designerinfo WHERE designerID ='$lastdesignerID'";

	   	$result7 = mysqli_query($conn,$sql7);

		if (mysqli_query($conn, $sql7)) 
		{
	    	//echo "<br>shopper location";

	    	echo '<br>designer info';

	    	$row7 = mysqli_fetch_array($result7);

	    	echo $_SESSION['desFname'] = $desFname = $row7['designerFname'];
	    	echo '<br>';
	    	echo $_SESSION['desSname'] = $desSname = $row7['designerSname'];
	    	echo '<br>';
	    	echo $_SESSION['desEmail'] = $desEmail = $row7['designerEmail'];
	    	echo '<br>';
	    	echo $_SESSION['desPhonenumber'] = $desPhonenumber = $row7['designerPhonenumber'];
	    	echo '<br>';
	   		//header('Location: ../html/shoppingCart.php');
	   		header("Location: ../mailernew/deliverynotice.php");
		} 
		else 
		{
		    echo "Error: " . $sql7 . "<br>" . mysqli_error($conn);
		}


	    //header("Location: ../mailernew/deliverynotice.php");
	} else {
	    echo "Error: " . $sql6 . "<br>" . mysqli_error($conn);
	}




?>