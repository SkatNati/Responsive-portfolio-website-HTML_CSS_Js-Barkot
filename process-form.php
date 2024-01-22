<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$host = "localhost:3306";
$dbname = "barkotnu_db";
$username = "barkotnu_dev";
$password = "56Nma4#o4RcO";

$conn = mysqli_connect( hostname: $host, 
                        username: $username, 
                        password: $password, 
                        database: $dbname );

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO `Contacts-Messages` (name, email, message)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param( $stmt, "sss",
                        $name,
                        $email,
                        $message);

mysqli_stmt_execute($stmt);

echo "<script type='text/javascript'>
        alert('Thank you for reaching out to us! Your message has been successfully received.');
        window.location.href = '/#contact'; // Replace '/#contact' with your homepage URL
     </script>";


