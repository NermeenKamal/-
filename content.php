<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $recommendation = $_POST['recommendation'];

    $serverName = "NERMEEN";
    $connectionOptions = array(
        "Database" => "recommend",
        "TrustServerCertificate" => true
    );

    $serverName = "NERMEEN";
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die("Error connecting to the database: " . print_r(sqlsrv_errors(), true));
    }

    $sql = "INSERT INTO Recommendations (name, email, recommendation) VALUES (?, ?, ?)";
    $params = array($name, $email, $recommendation);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo "Error inserting data: " . print_r(sqlsrv_errors(), true);
    } else {
        echo "Success";
    }

    sqlsrv_close($conn);
}
?>
