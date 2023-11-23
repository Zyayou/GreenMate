<?php 
    $con = mysqli_connect("localhost", "root", "password", "green");
 
    $m_id = $_POST["m_id"];
    $m_name = $_POST["m_name"];
    $m_pw= $_POST["m_pw"];
    $m_email = $_POST["m_email"];
    $m_birth = $_POST["m_birth"];
    $m_phone = $_POST["m_phone"];
 
try {
    $statement_member = mysqli_prepare($con, "INSERT INTO member (m_id, m_name, m_pw, m_email, m_birth, m_phone) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement_member, "ssssss", $m_id, $m_name, $m_pw, $m_email, $m_birth, $m_phone);
    mysqli_stmt_execute($statement_member);

    $statement_score = mysqli_prepare($con, "INSERT INTO score (sc_m_id, sc_ox1, sc_ox2, sc_ox3) VALUES (?,0,0,0)");
    mysqli_stmt_bind_param($statement_score, "s", $m_id);
    mysqli_stmt_execute($statement_score);
 
    $response = array();
    $response["success"] = true; 
}
catch(Exception $e) {
  $response["success"] = false;
}
    echo json_encode($response);
?>