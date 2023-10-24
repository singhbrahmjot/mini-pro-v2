<?php
$server = "localhost";     // Your MySQL server (usually "localhost")
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$database = "loggingin";  // Your MySQL database name

// Create a connection to the database
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize user inputs (prevent SQL injection)
function sanitizeInput($input) {
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}

// Handle user registration
if (isset($_POST['signup'])) {
    $username = sanitizeInput($_POST['username']);
    $Email = sanitizeInput($_POST['Email']);
    $password =$_POST['password']; // no Hash the password

    // Insert user data into the database
    $sql = "INSERT INTO signup (Email, username,  password) VALUES ( '$Email','$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Handle user login
if (isset($_POST['login'])) {
    $username = sanitizeInput($_POST['loginUsername']);
    $password = $_POST['loginPassword'];

    // Retrieve the user's hashed password from the database
    $sql = "SELECT id, password FROM signup WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        // Verify the password
        if ($password == $stored_password) {
            echo "Login successful.";
            // You can set session variables or redirect to a logged-in page here.
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

// Close the database connection
mysqli_close($conn);
?>