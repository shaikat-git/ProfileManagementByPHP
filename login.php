<?php
	session_start();
	require('dbcon.php');
	require('functions.php');
	//print_r($_POST);
	
	if(isset($_POST['login'])){
		$user = saveMe($_POST['user']);
		$pass = sha1(saveMe($_POST['pass']));
		
		$qr = mysql_query("SELECT Name FROM info WHERE User='$user' AND Pass='$pass'");
		if(mysql_num_rows($qr) == 1){
			//echo "Got it";
			$data = mysql_fetch_assoc($qr);
			
			$_SESSION['name'] = $data['Name'];
			$_SESSION['login'] = 'done';
			
			header('Location: index.php');
			
		}else{
			echo "Wrong user name or password";
		}	
	}
		
	
	
	
?>




<form method="post" action="">
	<p><label>User Name<input type="text" name="user" value="" placeholder="User Name" /></label></p>
	<p><label>Password <input type="password" name="pass" value="" placeholder="Password" /></label></p>
	<p><input type="submit" name="login" value="Login" /></p>
</form>