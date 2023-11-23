<?php 
    $con = mysqli_connect("localhost", "root", "password", "green");
 
    $m_id = $_POST["m_id"];
    $q_state = $_POST["q_state"];
 
try {
    $statement;
    if($q_state == "sc_ox1"){
        $statement = mysqli_prepare($con, "UPDATE score SET sc_ox1=1 WHERE sc_m_id=?");
    }
    elseif($q_state == "sc_ox2"){
        $statement = mysqli_prepare($con, "UPDATE score SET sc_ox2=1 WHERE sc_m_id=?");
    }
    elseif($q_state == "sc_ox3"){
        $statement = mysqli_prepare($con, "UPDATE score SET sc_ox3=1 WHERE sc_m_id=?");
    }

    if(!$statement){
        throw new Exception(mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "s", $m_id);
    mysqli_stmt_execute($statement);
 
    $response = array();
    $response["success"] = true; 
}
catch(Exception $e) {
  $response["exception"] = $e->getMessage();
  $response["success"] = false;
}
    echo json_encode($response);
?>