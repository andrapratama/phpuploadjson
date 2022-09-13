<?php
include "connection.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    // Allow JSON file formats
    if (
        $fileType != "json"
    ) {
        echo "Sorry, only JSON";
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

        //insert data to database
        $filename = "uploads/" . $_FILES["fileToUpload"]["name"];
        $data = file_get_contents($filename); //Read the JSON file in PHP
        $array = json_decode($data, true); //Convert JSON String into PHP Array

        $query = '';
        foreach ($array as $row) //Extract the Array Values by using Foreach Loop
        {
            $fields = implode(", ", array_keys($row));
            $values = implode("', '", array_values($row));
            $query .= "INSERT INTO $tableName ($fields) VALUES ('$values'); ";  // Make Multiple Insert Query 
        }

        $connectionInfo = array(
            "UID" => $uid,
            "PWD" => $pwd,
            "Database" => $databaseName
        );

        /* Connect using SQL Server Authentication. */
        $conn = sqlsrv_connect($serverName, $connectionInfo);
        if ($stmt = sqlsrv_query($conn, $query)) //Run Mutliple Insert Query
        {
            echo 'Imported JSON Data';
        }

        /* Free statement and connection resources. */
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
