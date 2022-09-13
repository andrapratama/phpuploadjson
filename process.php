<?php
include "connection.php";

$connectionInfo = array(
    "UID" => $uid,
    "PWD" => $pwd,
    "Database" => $databaseName
);

/* Connect using SQL Server Authentication. */
$conn = sqlsrv_connect($serverName, $connectionInfo);

$tsql = "SELECT COUNT(*) FROM $tableName";

/* Execute the query. */

$stmt = sqlsrv_query($conn, $tsql);
var_dump($stmt);
exit;
if ($stmt) {
    echo "Statement executed.<br>\n";
} else {
    echo "Error in statement execution.\n";
    die(print_r(sqlsrv_errors(), true));
}

/* Iterate through the result set printing a row of data upon each iteration.*/


echo "Total : " . $stmt . "item(s)";


/* Free statement and connection resources. */
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
