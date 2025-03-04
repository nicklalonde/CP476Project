<?php
$servername = "localhost";
$username = "root";
$password = "#########";
$db_name = "cp476";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");

    // Correct way to execute a SELECT query
    // $query = "SELECT * FROM Name";
    // $result = $conn->query($query);

    // Check if there are rows returned
    // if ($result->num_rows > 0) {
    //     // Fetch results as an associative array
    //     while ($row = $result->fetch_assoc()) {
    //         echo "ID: " . $row["student_id"] . " - Name: " . $row["full_name"] . "<br>";
    //     }
    // } else {
    //     echo "No records found.";
    // }

    // Free the result set
    // $result->free();
    
} catch (Exception $e) {
    error_log($e->getMessage());
    echo $e->getMessage();
    exit("Error connecting to database.");
}
?>
