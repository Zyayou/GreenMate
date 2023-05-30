<?php
    $con = mysqli_connect("localhost", "root", "xkdlrj12", "green");
    mysqli_query($con,'SET NAMES utf8');
 
    $m_id = $_POST["m_id"];
    $m_pw = $_POST["m_pw"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM member WHERE m_id = ? AND m_pw = ?");
    mysqli_stmt_bind_param($statement, "ss", $m_id, $m_pw);
    mysqli_stmt_execute($statement);
 
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $m_id, $m_name ,$m_pw, $m_email, $m_birth, $m_phone, $m_rpt, $m_img, $m_grade);

    $response = array();
    $response["success"] = false;
 
    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["m_id"] = $m_id;
        $response["m_pw"] = $m_pw;
        $response["m_name"] = $m_name;      
    }
 
    echo json_encode($response);
?>