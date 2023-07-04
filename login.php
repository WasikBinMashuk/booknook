<?php 
include("connect.php");
include "myFunctions.php";


	if(isset($_POST['submit']))
	{
		//something was posted
		$email = $_POST['email'];
		$password =$_POST['pass'];

		$login_query = "SELECT * FROM user_details WHERE email like '%$email%' AND password like '%$password%'";
		$login_query_run=mysqli_query($conn,$login_query);
		if(mysqli_num_rows($login_query_run)>0){
			$_SESSION['user']=true;
			$userdata=mysqli_fetch_array($login_query_run);
			$username=$userdata['username'];
			$useremail=$userdata['email'];
			$roleAs=$userdata['role_as'];
			$_SESSION['user_description']=[
				'name'=> $username,
				'email'=> $useremail
			];
			$_SESSION['role_as']=$roleAs;
			if($roleAs == 1){
				header('location:Admin.php');
			}
			else{
				header('location:sellerPage.php');
			}
			
		}
		else{
			echo '<script>alert("Invalid input");</script>';
			
		}

	}

 ?>