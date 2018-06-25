<?php
	require_once('db.php');

	$db = new db("localhost", 'slim', 'root', '');

	if ($_SERVER['REQUEST_METHOD'] == "GET") 
	{
		//echo json_encode($db->query("SELECT * FROM customers"));
		
	//getting particular customers
		$url = $_GET['url'];
		if($url == "auth")
		{
			if(isset($_GET['id']))
			{
				$id = mysql_real_escape_string($_GET['id']);
			}
			
			if(isset($_GET['name']))
			{
				$name = mysql_real_escape_string($_GET['name']);
			}
			
			if(isset($_GET['email']))
			{
				$email = mysql_real_escape_string($_GET['email']);
			}

			if(isset($_GET['address']))
			{
				$address = mysql_real_escape_string($_GET['address']);
			}

			if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['address']))
			{
				$data = $db->query("SELECT * FROM customers WHERE id='$id'");
			
				echo $data;
			}

			if(isset($_GET['id']))
			{
				$data = $db->query("SELECT name, address, email FROM customers WHERE id='$id'");
				echo "<pre>";
					print_r($data);
				echo "</pre>";
				
				//echo json_encode($data);	

				// foreach ($data as $student) {
				// 	echo $student['name'] . " is from " . $student['address'];
				// }
			}
			
		}
		else
		{
			http_response_code(404);
			die('invalid url ' . $url);
		}

	} 
	else if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		echo "post";
	} 
	else 
	{
	  	http_response_code(405);
	}

?>