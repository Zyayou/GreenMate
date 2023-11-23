<?php
    $con = mysqli_connect("localhost", "root", "password", "green");
    mysqli_query($con, 'SET NAMES utf8');
 
    $cle_state = $_POST["cle_state"];
    $cle_city = $_POST["cle_city"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM clean WHERE cle_state = ? AND cle_city = ?");
    mysqli_stmt_bind_param($statement, "ss", $cle_state, $cle_city);
    mysqli_stmt_execute($statement);
 
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $cle_no, $cle_state, $cle_city, $cle_address, $cle_lat, $cle_lng);

    $response = array();
    $response["success"] = false;
    $response["locations"] = array(); // 배열을 생성하여 위치 정보를 담을 예정

    while (mysqli_stmt_fetch($statement)) {
        $location = array();
        $location["cle_address"] = $cle_address;
        $location["cle_lat"] = $cle_lat;
        $location["cle_lng"] = $cle_lng;

        // locations 배열에 현재 위치 정보 추가
        array_push($response["locations"], $location);

        $response["success"] = true;
    }

    // JSON response로 반환
    echo json_encode($response);
?>
