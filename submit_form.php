<?php
// Database configuration
$servername = "localhost:3306";
$username = "root";
$password = "1234"; // Assuming no password is set for your XAMPP MySQL
$dbname = "blood_donate"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pincode = $_POST["pincode"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $taluk = $_POST["taluk"];
    $villageCity = $_POST["villageCity"];
    $bloodGroup = $_POST["bloodGroup"];
    $message = $_POST["message"];

    // SQL query to insert data into the table
    $sql = "INSERT INTO form_submissions (name, email, phone, pincode, state, district, taluk, villageCity, bloodGroup, message) VALUES ('$name', '$email', '$phone', '$pincode', '$state', '$district', '$taluk', '$villageCity', '$bloodGroup', '$message')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
