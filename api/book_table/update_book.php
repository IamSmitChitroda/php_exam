<?php
include ("../../config.php");
header('Content-Type: application/json');

$congin = new Config();
$conn_res = $congin->connect();

header('Content-Type: application/json');

$name = $_POST['book'];
$id = $_POST['id'];
$arr = array();

if ($id != null && $name != null) {
    if ($conn_res) {
        $sql = "UPDATE `book_table` SET `book` = '$name' WHERE `id`= $id";
        $response = mysqli_query($conn_res, $sql);
        if ($response) {
            $arr = array("status_code" => "200", "message" => "Data Update Successfully", "is_success" => "true");
            echo json_encode($arr, JSON_PRETTY_PRINT);
            http_response_code(200);
        } else {
            $arr = array("status_code" => "500", "message" => "Data Update Failed", "is_success" => "false");
            echo json_encode($arr, JSON_PRETTY_PRINT);
            http_response_code(500);
        }
    } else {
        $arr = array("status_code" => "500", "message" => "Connection Failed", "is_success" => "false");
        echo json_encode($arr, JSON_PRETTY_PRINT);
        http_response_code(500);
    }
} else {
    $arr = array("status_code" => "400", "message" => "Id and Name are must be required", "is_success" => "false");
    echo json_encode($arr, JSON_PRETTY_PRINT);
    http_response_code(400);
}
