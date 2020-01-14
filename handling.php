<?php
require_once "koneksi.php";

//Insert DATA
if(isset($_POST["submit"])){
    $nama   = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $nohp   = $_POST["nohp"];
    $for_query = "";

    if(!empty($_POST["hobi"]))
        foreach($_POST["hobi"] as $hobi){
            $for_query .= $hobi . ",";
        }
    
    $for_query = substr($for_query,0,-1);

    $query = "INSERT INTO dbo.tb_users (nama, alamat, nohp, hobi) VALUES (?,?,?,?);";
    $params = array($nama,$alamat,$nohp,$for_query);
    $getResults= sqlsrv_query($conn, $query, $params);

    $rowsAffected = sqlsrv_rows_affected($getResults);
    if ($getResults == FALSE or $rowsAffected == FALSE)
        die(FormatErrors(sqlsrv_errors()));
    $hasil = $rowsAffected. " Data berhasil ditambahkan!" . PHP_EOL;
    sqlsrv_free_stmt($getResults);
}
?>