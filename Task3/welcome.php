<?php 
	session_start();

	if (! isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
</head>
<body>

	<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

	<br><br>
	<form >
        <fieldset>
            <legend>Change Password</legend>
            <label for="cpassword">Current Password</label>
            <input type="password" name="cpassword" id="cpassword">
            <br><br>
            <label for="npassword">New Password</label>
            <input type="password" name="npassword" id="npassword">
            <br><br>
            <label for="copassword">Confirm Password</label>
            <input type="password" name="copassword" id="copassword">
            
        </fieldset>
        <input type="submit" name="submit" value="Confirm">
    </form>

	<a href="logout.php">Logout</a>

</body>
</html>