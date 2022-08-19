<?php
define("HOSTNAME", "localhost");
define("USERNAME", "admin");
define("PASSWORD", "admin");
define("DBNAME", "bookdb");

// Open a connection with your database from php.
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

// Check my connection and prompt a message
if(mysqli_connect_error()) {
    echo "Failed to connect to the database.<br>".mysqli_connect_error();
}
?>