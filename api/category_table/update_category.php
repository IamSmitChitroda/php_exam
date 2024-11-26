<?php
include ("../../config.php");
header('Content-Type: application/json');

$congin = new Config();
$conn_res = $congin->connect();

$id = $_POST['id'];
$cate = $_POST['category'];
$subcate = $_POST['subcategory'];
$arr = array();

if ($cate != null && $subcate != null && $id != null) {
    if ($conn_res) {
        $sql = "UPDATE `category_table` SET `category`='$cate',`subcategory`='$subcate' WHERE $id";
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
    $arr = array("status_code" => "400", "message" => "Category and SubCategory are must be required", "is_success" => "false");
    echo json_encode($arr, JSON_PRETTY_PRINT);
    http_response_code(400);
}