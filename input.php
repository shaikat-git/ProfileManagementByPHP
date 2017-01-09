<?php
	session_start();
	require_once('dbcon.php');
	require_once('functions.php');
	checkLogin();
	
			
	$qr = mysql_query("SELECT * FROM courses ORDER BY nick");				
	$op="";
	while($data = mysql_fetch_assoc($qr)){				
		$op .= "<option value='".$data['sn']."'>".$data['nick']."</option>";
	}				

?>
<form method="post" action="process.php" enctype="multipart/form-data">
	<p>
		<label>Full Name 
		<input type="text" name="name" value="" placeholder="Full Name" required>
		</label>
	</p>
	
	<p>
		<label>Email 
		<input type="email" name="email" value="" placeholder="Email" required>
		</label>
	</p>
	
	<p>
		<label>User Name 
		<input type="text" name="user" value="" placeholder="User Name" required>
		</label>
	</p>
	
	<p>
		<label>Password 
		<input type="password" name="pass" value="" placeholder="Password" required>
		</label>
	</p>
	
	<p>
		<label>Course Name 
		<select name="course[]" multiple>
			<option value="">Select One</option>
			<?php echo $op ?>			
		</select>
		
		</label>
	</p>
	
	<p>Section
		<label>	<input checked type="checkbox" name="section[]" value="Design"> Design	</label>
		<label>	<input type="checkbox" name="section[]" value="Development"> Development	</label>
	</p>
	
	<p>Shift
		<label>	<input checked type="radio" name="shift" value="Morning"> Morning	</label>
		<label>	<input type="radio" name="shift" value="Day"> Day	</label>
		<label>	<input type="radio" name="shift" value="Evening"> Evening	</label>
	</p>
	
	<p>
		<label>Choose An Image 
			<input type="file" name="myfile" >
		</label>
	</p>
	
	<p>More Information:
	<textarea name="more"></textarea>
	</p>
	
	<input type="submit" name="send" value="Send">
	<input type="reset" name="reset" value="Reset">

</form>



<hr>
<h4>Hi, <?php echo $_SESSION['name']?> [ <a href="logout.php">Log Out</a>]</h4>
<a href="index.php">View Data</a>









