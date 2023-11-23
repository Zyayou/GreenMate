<?php 
    $con = mysqli_connect("localhost", "root", "password", "green");
 
    $m_id = $_POST["m_id"];

try {
    $statement_score = mysqli_prepare($con, "DELETE FROM score WHERE sc_m_id=?");
    mysqli_stmt_bind_param($statement_score, "s", $m_id);
    mysqli_stmt_execute($statement_score);

    $statement_member = mysqli_prepare($con, "DELETE FROM member WHERE m_id=?");
    mysqli_stmt_bind_param($statement_member, "s", $m_id);
    mysqli_stmt_execute($statement_member);
 
    $response = array();
    $response["success"] = true; 
}
catch(Exception $e) {
  $response["success"] = false;
}
    echo json_encode($response);
?>