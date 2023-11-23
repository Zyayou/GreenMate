<?php
    $con = mysqli_connect('localhost', 'root', 'password', 'green');

    $m_email = $_POST["m_email"];

    $statement2 = mysqli_prepare($con, "SELECT m_email FROM member WHERE m_email = ?");

    mysqli_stmt_bind_param($statement2, "s", $m_email);
    mysqli_stmt_execute($statement2);
    mysqli_stmt_store_result($statement2);
    mysqli_stmt_bind_result($statement2, $userEmail);

    $response = array();
    $response["success"] = true;

    while(mysqli_stmt_fetch($statement2)){
      $response["success"] = false;
      $response["m_email"] = $m_email;
    }

    echo json_encode($response);
?>