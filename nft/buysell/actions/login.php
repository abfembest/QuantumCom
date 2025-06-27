<?php session_start();
include 'db_connect.php';
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $connect->prepare('SELECT id, fullname, username, password,waddress, referals,salesstatus,buystatus FROM quantum.applicant WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id,$fullname, $username, $password, $waddress, $referals,$salesstatus,$buystatus);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
	if ($_POST['password'] !== $password) {

		$_SESSION["status"] = "Invalid password combination.";
		header('location:../login.php');
		# code...
	}
	elseif ($_POST['password'] === $password) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $password;
		$_SESSION['referals'] = $user_access;
		$_SESSION['fullname'] = $name;

		if ($user_access<50) {

			header('Location: ../index.php');
		}

		elseif ($user_access >55 && $user_access<=100) {
			header('Location: ../index.php');
		}

		elseif($user_access ==3){
			header('Location: ../addstocksc.php');
		}
		elseif($user_access ==0){
			echo $_SESSION["disabled"] = "This user has been disabled";
			header('Location: ../login.php');
		}
		
		
	 } 
	}	
	 
	 else {
	 	$_SESSION["status"] = "Invalid username supplied.";
		header('location:../login.php');
	}

$connect->close();
?>
