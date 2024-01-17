<?php
// Replace these variables with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jj';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Basic validation (you may want to add more robust validation)
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } else {
        // TODO: Add more secure password handling (e.g., hashing) before comparing with the database

        // Check if the user exists in the database
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Successful login
            header("Location: choss.html");
            exit();
            
        } else {
            // Invalid login credentials
            echo "Invalid username or password.";
        }
    }
}

// Close the database connection
$conn->close();
?>
