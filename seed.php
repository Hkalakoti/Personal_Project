<?php session_start();
?>
<?php require 'config.php';

//read the json file contents
$jsondata = file_get_contents('countries.json');

//convert json object to php associative array
$data = json_decode($jsondata, true);

foreach ($data as $data) {
    $name[] = $data['name'];
}

$_SESSION['row'] = $name;
print_r($_SESSION['row']);
die;

if (is_array($name)) {

    $sql = "INSERT INTO countries (name) values ";

    $valuesArr = array();

    foreach ($name as $row) {
        $name = mysqli_real_escape_string($conn, $row);
        $valuesArr[] = "('$name')";
    }

    $sql .= implode(',', $valuesArr);

    mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}
?>