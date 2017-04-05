<p>Please select the email addresses to delete from the email list and click Remove.</p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
		or die('Error connecting to server.');

	if (isset($_POST['submit'])) {
		foreach ($_POST['todelete'] as $delete_id) {
			$query = "delete from email_list where id=$delete_id";
			mysqli_query($dbc, $query) or die('Error querying database.');
		}
		echo 'Customer(s) removed.<br><br>';
	}

	$query = "select * from email_list";
	$result = mysqli_query($dbc, $query);

	while ($row = mysqli_fetch_array($result)) {
		echo '<label><input type="checkbox" value="' . $row['id'] . '" name="todelete[]">';
		echo $row['first_name'];
		echo ' ' . $row['last_name'];
		echo ' - ' . $row['email'] . '</label>';
		echo '<br>';
	}

	mysqli_close($dbc);
?>
	<input type="submit" name="submit" value="Remove">
</form>