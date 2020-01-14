<?php 
include "handling.php";
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Input</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Submission 1 - Azure Cloud Developer</a>
    </nav>
    <br>
    <div class="row">
        <div class="col-5">
        <h2 class="text-center">Form Input Data</h2>
        <hr>
            <form method="POST">
                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="nohp">No. HP :</label>
                    <input type="text" class="form-control" name="nohp">
                </div>
                <label for="hobi">Hobi : </label>
                <br>
                <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="hobi[]" value="coding">Coding
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="hobi[]" value="config">Config
                    </label>
                </div>
                <br>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <br>
               <p class="text-success"><?php echo @$hasil; ?></p>
            </form>
        </div>
        <span class="border-right"></span>
        <div class="col-6">
        <h2 class="text-center">Data</h2>
        
        <table class="table table-border">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Hobi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                //Views Data
                $query= "SELECT nama, alamat, nohp, hobi FROM dbo.tb_users;";
                $getResults= sqlsrv_query($conn, $query);

                // echo ("Reading data from table" . PHP_EOL);
                if ($getResults == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                    // echo ($row['nama'] . " " . $row['alamat'] . " " . $row['nohp'] . " " . $row['hobi'] . PHP_EOL);
                    echo "
                    <tr>

                        <td>" . $row['nama'] . "</td>
                        <td>" . $row['alamat'] . "</td>
                        <td>" . $row['nohp'] . "</td>
                        <td>" . $row['hobi'] . "</td>
                    </tr>";
                }

            sqlsrv_free_stmt($getResults);

            function FormatErrors( $errors )
            {
                /* Display errors. */
                echo "Error information: ";

                foreach ( $errors as $error )
                {
                    echo "SQLSTATE: ".$error['SQLSTATE']."";
                    echo "Code: ".$error['code']."";
                    echo "Message: ".$error['message']."";
                }
            }
            ?>
            </tbody>
        </table>
        </div>

    </div>
</div>
</body>
</html>