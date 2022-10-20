<?php 
?>
<?php require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// collect value of input field
	$name = $_REQUEST['name'];

	// $sql = "INSERT INTO users (name) VALUES ('$name')";
	$result = mysqli_query($conn, "SELECT * FROM users");
	
	while($row = mysqli_fetch_array($result)) {
		$names[] = $row['name'];
	 }

	echo '<pre>';
	
	$_SESSION['row'] = $names;
	
	print_r($_SESSION['row']);

	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode" => 200));
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>