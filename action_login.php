<?php session_start();
include 'nft/buysell/db_connect.php';
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['myid'], $_POST['pass']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
    //$_SESSION["status"] = "Invalid username supplied.";
		#header('location:home.php');
		
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $connect->prepare('SELECT id, fullname, username, password, waddress, referals,salesstatus,buystatus, myid, access,active, activate FROM quantum.applicants WHERE myid = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['myid']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $fullname, $username, $password, $waddress, $referals,$salesstatus,$buystatus,$myid, $access, $active, $activate);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		$password1 = $_POST['pass'];

		if ($active>0) {
			$_SESSION["status"] = "Account suspended contact support.";
		header('location:home.php');
		}elseif ($activate==0) {
			$_SESSION["status"] = "You need to activate your account from your email.";
		header('location:home.php');
		}
		
		else{

		$pverify = password_verify($password1,$password);
	if (!$pverify) {
		$_SESSION["status"] = "Invalid password combination.";
		header('location:home.php');
		# code...
	}
	elseif ($pverify) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $pverify;
		$_SESSION['referals'] = $referals;
		$_SESSION['fullname'] = $fullname;
		$_SESSION['salesstatus'] = $salesstatus;
		$_SESSION['buystatus'] = $buystatus;
		$_SESSION['waddress'] = $waddress;
		$_SESSION['buystatus'] = $buystatus;
		$_SESSION['myid'] = $myid;
		$myid =$_SESSION['username'];
		$query = "UPDATE quantum.market SET onlineid = '1'  WHERE userid = '$myid' AND unit>0";
		if(mysqli_multi_query($connect,$query)){
					header('Location: nft/buysell/index.php');
				}

				else{
					header('Location: nft/home.php');
				}

				
				
			} 
			}
		}	
	 
	 else {
	 	$_SESSION["status"] = "Invalid details supplied.";
		header('location:home.php');
		exit;
	}


$connect->close();
?>
