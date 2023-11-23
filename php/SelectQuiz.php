<?php 
    $con = mysqli_connect("localhost", "root", "password", "green");
 
    $q_rand = $_POST["q_rand"];

try {
    $statement = mysqli_prepare($con, "SELECT q_q, q_a FROM quiz WHERE q_no=?");
    mysqli_stmt_bind_param($statement, "s", $q_rand);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $q_quiz, $q_answer);

    $response = array();
    $response["success"] = false; 
    
    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["q_quiz"] = $q_quiz;
        $response["q_answer"] = $q_answer;
    }
    
}
catch(Exception $e) {
    $response["success"] = false;
}
    echo json_encode($response);
?>