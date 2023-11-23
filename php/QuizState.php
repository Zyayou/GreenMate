<?php 
    $con = mysqli_connect("localhost", "root", "password, "green");
 
    $m_id = $_POST["m_id"];

try {
    $statement = mysqli_prepare($con, "SELECT CASE WHEN sc_ox1 = 0 AND sc_ox2 = 0 AND sc_ox3 = 0 THEN 'sc_ox1' WHEN sc_ox2 = 0 AND sc_ox3 = 0 THEN 'sc_ox2' ELSE 'end' END AS result FROM score WHERE sc_m_id = ?");
    mysqli_stmt_bind_param($statement, "s", $m_id);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $q_state);

    $response = array();
    $response["success"] = false; 
    
    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["q_state"] = $q_state;
    }
    
}
catch(Exception $e) {
    $response["success"] = false;
}
    echo json_encode($response);
?>