<?php
    $con = mysqli_connect("localhost", "root", "password", "green");
    mysqli_query($con, 'SET NAMES utf8');
 
    $rec_title = $_POST["rec_title"];
    $rec_category = $_POST["rec_category"];
    $rec_content = $_POST["rec_content"];
    
$statement = mysqli_prepare($con, "SELECT rec_title, rec_category, rec_content FROM recycle");
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $rec_title, $rec_category, $rec_content);

$response = array();
$response["success"] = false;
$response["locations"] = array(); // 배열을 생성

while (mysqli_stmt_fetch($statement)) {
    $location = array();
    $location["rec_title"] = $rec_title;
    $location["rec_category"] = $rec_category;
    $location["rec_content"] = $rec_content;

    // locations 배열에 현재 위치 정보 추가
    array_push($response["locations"], $location);

    $response["success"] = true;
}

// JSON response로 반환
echo json_encode($response);

