<?php
include ("../../config.php");
header('Content-Type: application/json');

$config = new Config();
$conn_res = $config->connect();


if ($conn_res) {

  $sql = "SELECT * FROM book_table";
  
  $result = mysqli_query($conn_res, $sql);

    $arr = array();
    while ($result_row = $result->fetch_assoc()) {
        $arr[] = $result_row;
    }



    echo json_encode($arr, JSON_PRETTY_PRINT);
    http_response_code(200);
}
 else {
    echo json_encode("Connection Failed", JSON_PRETTY_PRINT);
    http_response_code(500);
}