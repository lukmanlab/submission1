<?php
// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "lukman", "pwd" => "8846mZ9nRwf6", "Database" => "SQL1-lukmanlab", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sql1-lukmanlab.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>