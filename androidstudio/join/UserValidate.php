<?php
    $con = mysqli_connect('localhost', 'root', 'xkdlrj12', 'green');

    $m_id = $_POST["m_id"];

    $statement = mysqli_prepare($con, "SELECT m_id FROM member WHERE m_id = ?");

    mysqli_stmt_bind_param($statement, "s", $m_id);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID);

    $response = array();
    $response["success"] = true;

    while(mysqli_stmt_fetch($statement)){
      $response["success"] = false;
      $response["m_id"] = $m_id;
    }

    echo json_encode($response);
?>