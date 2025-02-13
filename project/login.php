<?php
session_start();
$conn=pg_connect("host=localhost dbname=test user=root password=root");

// Establish a connection to the PostgreSQL database


// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . pg_last_error());
}

// Get the user's email and password from the login form
$email = $_POST['uname'];
$password = $_POST['password'];

// Sanitize the user inputs to prevent SQL injection attacks
$email = pg_escape_string($conn, $email);
$password = pg_escape_string($conn, $password);

// Build the SQL query to check if the user exists in the database
$sql = "SELECT * FROM login WHERE user_name='$email' AND password='$password'";

// Execute the query
$result = pg_query($conn, $sql);

// Check if the query was successful
if (!$result) {
  die("Query failed: " . pg_last_error());
}

// Check if the user exists in the database
if (pg_num_rows($result) > 0) {
  // User exists, log them in
  session_start();
  $_SESSION['email'] = $email;
  header("Location: home.php");
} else {
  // User does not exist, show an error message
  echo "<center><br><br><br>Invalid email or password</center>";

}

// Close the database connection
pg_close($conn);
?>

