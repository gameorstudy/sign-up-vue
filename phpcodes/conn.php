<?php
// set content return type
header('Content-type: application/json');

// set up some server access controls to allow people to get information
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache');

$servername = "localhost";
$username = "root";
$password = "xjy415161";

try {
    $conn = new PDO("mysql:host=$servername; dbname=online_lessons", $username, $password);
    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    /*
    // sql to delete all records
    $stmt_delete = "DELETE * FROM user";
    
    // use exec() because no results are returned
    $conn -> exec($stmt_delete);
    echo "Recode(s) deleted successfully";
    */
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = validate_input($_POST["username"]);
        $password = validate_input($_POST["password"]);

        // query before inserting
        $stmt_query = $conn -> query("SELECT username FROM user") -> fetchAll();
        foreach ($stmt_query as $row) {
            if ($row["username"] === $username) {
                echo "Username is existed";
                return;
            }
        }
        $stmt = $conn -> prepare("INSERT INTO user(username, password) VALUES ('$username', '$password')");
        $stmt -> execute();
        
        echo "Successfully sign up";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e -> getMessage();
}

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn = null;

?>