<?php 
    $con = mysqli_connect("localhost", "root", "xkdlrj12", "green");
 
    $m_id = $_POST["m_id"];
    $m_name = $_POST["m_name"];
    $m_pw= $_POST["m_pw"];
    $m_email = $_POST["m_email"];
    $m_birth = $_POST["m_birth"];
    $m_phone = $_POST["m_phone"];
 
   try {
    $statement = mysqli_prepare($con, "INSERT INTO member (m_id, m_name, m_pw, m_email, m_birth, m_phone) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "ssssss", $m_id, $m_name, $m_pw, $m_email, $m_birth, $m_phone);
    mysqli_stmt_execute($statement);
 
    $response = array();
    $response["success"] = true; 
}
catch(Exception $e) {
  $response["success"] = false;
}
    echo json_encode($response);
?>