<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
		or die('Error connecting to server.');

	$email = $_POST['email'];

	$query = "delete from email_list where email='$email'";

	mysqli_query($dbc, $query) or die('Error querying database');

	echo "Success to remove '$email'";

	mysqli_close($dbc);
?>