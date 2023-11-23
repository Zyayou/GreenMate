<?php 
    $con = mysqli_connect("localhost", "root", "password", "green");
 
    $m_id = $_POST["m_id"];
    $m_name = $_POST["m_name"];
    $m_pw= $_POST["m_pw"];
    $m_email = $_POST["m_email"];
    $m_birth = $_POST["m_birth"];
    $m_phone = $_POST["m_phone"];
 
   try {
    $statement = mysqli_prepare($con, "UPDATE member SET m_name = ?, m_pw = ?, m_email = ?, m_birth = ?, m_phone = ? WHERE m_id = ?");

    mysqli_stmt_bind_param($statement, "ssssss", $m_name, $m_pw, $m_email, $m_birth, $m_phone, $m_id);
    mysqli_stmt_execute($statement);
 
    $response = array();
    $response["success"] = true; 
}
catch(Exception $e) {
  $response["success"] = false;
}
    echo json_encode($response);
?>