<?php 
session_start();
if($_SESSION['customer_login'] != true)
{
	
	 header('location:customer_login.php');

}	

?>

<html>
    <head>
    
    <link rel="stylesheet" type="text/css" href="css/customer_profile_header.css" />
    <style>
    #home, #logout{

        background-color:rgba(5, 21, 71,0.9);
        border:none;
        padding:5px;
        width:70px;
        color:white;
        cursor:pointer;
        box-shadow:2px 2px 6px rgba(5, 21, 71,0.9);
        transition-duration: 0.6s;
    }

    #home:hover, #logout:hover{

        padding:10px;
        

    }
	</style>
	</head>
    
<body id="customer_profile">
    		
			
	<?php	
		include 'db_connect.php';
		
		$customer_id=$_SESSION['customer_Id'];
		$sql="SELECT * FROM bank_customers WHERE Customer_ID='$customer_id'";
		$result=$conn->query($sql);
		if($result->num_rows > 0)
		$row = $result->fetch_assoc();

	?>
       <div class="head">
            
            <div class="customer_details">
	
			
               <a href="upload.php"> <?php echo '<img class="custmr_img" src="data:image/jpeg;base64,'.base64_encode($row['Customer_Photo']).'"'; ?> onerror="this.src='img/customers/No_image.jpg'"  height="115px" width="105px"/> </a>
				  </div>
             <div class="welcome">

             <label>Welcome <?php echo $_SESSION['Username']; ?></label><h6 class="lstlogin">Last login : <?php echo $row['Last_Login'] ?> </h6>
                  </div>
            <a class="cust_home" href="customer_profile.php"><input type="button" name="home" value="Home" id="home"></a>
            <a class="cust_logout" href="customer_logout.php"><input type="button" name="logout_btn" value="Logout" id="logout"></a>
        
        </div>
    
        <div class="profile_nav" style="background-color: #CEE5D0;">
        <ul>
            <a href="customer_profile_myacc.php"><li style="color: black;" class="link1">My Account</li></a>
            <a href="customer_profile_myprofile.php"><li style="color: black;" class="link2">My Profile</li></a>
            <a href="customer_pass_change.php"><li style="color: black;" class="link3">Change Password</li></a>
            <a href="fund_transfer.php"><li style="color: black;" class="link4">Fund Transfer</li></a>
            <a href="cust_statement.php"><li style="color: black;" class="link5">Statement</li></a>
            </ul>
            </div>

    </body>
</html>