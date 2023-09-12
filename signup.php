<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Connect to the Access database using ODBC
    $conn = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=J:\PCK WORLD\FILE\BCA SEM 3\Site1\signup.php");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . odbc_errormsg());
    }

    // Prepare and execute an SQL INSERT statement
    $sql = "INSERT INTO signUp (username, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $email]);

    // Check if the INSERT was successful
    if ($stmt->rowCount() > 0) {
        echo "Registration successful.";
    } else {
        echo "Registration failed.";
    }

    // Close the database connection
    odbc_close($conn);
}
?>
