<?php
	@session_start();
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		header('Location: index.php');
		exit;	
	}
	require_once('dbcon.php');
	require_once('functions.php');
	
	//receive the data from form fields---------------------------------------------------------
	if(isset($_POST['send'])){
	
	
	//collect the file name;
	$file = $_FILES['myfile'];
	$ext = array('jpg','jpeg','png');
	$size = 100;
	$dir = 'upload';
	$uploaded_file_name = uploadFile($file,$ext,$size,$dir);
	
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$pass = sha1(saveMe($_POST['pass']));
	//$course = $_POST['course'];
	$section = implode(',', $_POST['section']); // bad practice
	$shift = $_POST['shift'];
	$more = $_POST['more'];
	$img = ($uploaded_file_name)? $uploaded_file_name :'demo.png';
	
	// insert the information	
	
	
	$sql = "INSERT INTO info (Name, Email, User, Pass,Section, Shift, More, Image) 
			VALUES('$name','$email','$user','$pass','$section','$shift','$more','$img')";
			
	mysql_query($sql);
	
	//$lastid = mysql_fetch_row(mysql_query("SELECT last_insert_id()"));
	$lastid = mysql_insert_id();
	
	$courses = $_POST['course'];
	while($c_id = array_shift($courses)){
		mysql_query("INSERT INTO choice(u_id,c_id) VALUES ('$lastid','$c_id')");
	}
	
	header('Location: index.php');
	exit;	
	}
	
	
	// delete an  information -------------------------------------------------------------------------
	if(isset($_POST['delete'])){		
		$del_id = (int)$_POST['del_id'];
		
		$qr = mysql_query("SELECT Image FROM info WHERE Id='$del_id'");
		if (mysql_num_rows($qr) != 0){
			$img = mysql_fetch_assoc($qr);		
			$path = "upload/".$img['Image'];		
			if($img['Image'] != 'demo.png' && file_exists($path)){
				unlink($path);
			}
		}
		
		$sql = "DELETE FROM info WHERE Id = '$del_id' LIMIT 1";
		mysql_query($sql);
		
		if(mysql_affected_rows()){
			mysql_query("DELETE FROM choice WHERE u_id='$del_id'");
			addMsg('Successfully Deleted');
		}else{
			addMsg('Problem While deleting the data');
		}
		
		header('Location: index.php');
		exit;	
	}
	
	//update old data--------------------------------------------------------------------
	
	if(isset($_POST['update'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$user = $_POST['user'];
		$pass = sha1(saveMe($_POST['pass']));
		$course = $_POST['course'];
		$section = implode(',', $_POST['section']);
		$shift = $_POST['shift'];
		$more = $_POST['more'];
		$old_img = $_POST['old_img'];
		
		$uid = $_POST['update_id'];
		
		//collect the file name;
		$file = $_FILES['myfile'];
		$ext = array('jpg','jpeg','png');
		$size = 100;
		$dir = 'upload';
		$uploaded_file_name = uploadFile($file,$ext,$size,$dir);
		
		if($uploaded_file_name){
			$img = $uploaded_file_name;
			
			$old_img_path = $dir."/".$old_img;	
			if($old_img != 'demo.png' && file_exists($old_img_path)){
				unlink($oldpath);
			}
		}else{
			$img = isEmpty($old_img,'demo.png');
		}		
		
		
	$sql = "UPDATE info SET 
			Name 	= '$name', 
			Email 	= '$email', 
			User 	= '$user', 
			Pass  	= '$pass',
			Section = '$section', 
			Shift 	= '$shift',
			Image	= '$img',
			More 	= '$more' 
			WHERE Id='$uid'";
		
		mysql_query($sql);
		
		//delete  the old data for the selected user to update the course info
		mysql_query("DELETE FROM choice WHERE u_id = '$uid' ");
		
		//update the course info
		$courses = $_POST['course'];
		while($c_id = array_shift($courses)){
			mysql_query("INSERT INTO choice(u_id,c_id) VALUES ('$uid','$c_id')");
		}
		
		
		header('Location: index.php');
		exit;
	}
	
	
	
?>