<?php 
    $con = mysqli_connect("localhost", "root", "password", "green");
 
    $m_id = $_POST["m_id"];
 
try {
    $statement = mysqli_prepare($con, "UPDATE member SET m_grade = m_grade+1 WHERE m_id=?");
    mysqli_stmt_bind_param($statement, "s", $m_id);
    mysqli_stmt_execute($statement);
 
    $response = array();
    $response["success"] = true; 
}
catch(Exception $e) {
  $response["success"] = false;
}
    echo json_encode($response);
?>