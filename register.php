<?php
	include_once 'includes/connection.php';
	include_once 'includes/function.php';
	
	$status = 0;
	if ( (isset($_POST['name'])) && (isset($_POST['roll_number'])) && (isset($_POST['hostel']))  
		 && (isset($_POST['nick'])) && (isset($_POST['email']))
	){
		$name  = $_POST['name'];
		$roll_number = $_POST['roll_number'];
		$hostel = $_POST['hostel'];
		$nick = $_POST['nick'];
		$email = $_POST['email'];
		$json_array = array(
	        'name' => $name,
	        'roll_number' => $roll_number,
	        'hostel' => $hostel
    	);
		$query = "INSERT INTO users (name,  email, hostel, nick, roll_number)
		 		VALUES ('{$name}', '{$email}', '{$hostel}', '{$nick}', '{$roll_number}'  ) ";
				
				$addition = mysql_query($query);
				confirm_query($addition, "Insertion");
				$status = 1;
	}
	$final_array = array('status' => $status ,  'data' => $json_array);
	echo json_encode($final_array);

?>