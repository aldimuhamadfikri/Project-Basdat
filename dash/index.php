<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dash";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

//ambil data total
$get1 = mysqli_query($koneksi, "select * from dashboard");
$count1 = mysqli_num_rows($get1);

//ambil data belum direview
$get2 = mysqli_query($koneksi, "select * from dashboard where status='Belum Direview'");
$count2 = mysqli_num_rows($get2);

// ambil data sudah diriview
$get3 = mysqli_query($koneksi, "select * from dashboard where status='Sudah Direview'");
$count3 = mysqli_num_rows($get3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


    <style>
        .mx-auto {
            width: 1200px
        }

        .card {
            margin-top: 10px
        }
    </style>

</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-center">
                <h1>DASHBOARD</h1>
            </div>
            <div class="card-body">
            </div>
        </div>
        <div class="row">
            <div class="col">.
                <div class="card bg-secondary p-3">
                    <h3>Total Proposal:
                        <?php echo $count1 ?>
                    </h3>
                </div>
            </div>
            <div class="col">.
                <div class="card bg-warning p-3">
                    <h3>Total Proposal Belum Direview:
                        <?php echo $count2 ?>
                    </h3>
                </div>
            </div>
            <div class="col">.
                <div class="card bg-primary p-3">
                    <h3>Total Proposal Sudah Direview:
                        <?php echo $count3 ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Progres Review Proposal Kerma
            </div>
            <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">IDKERMA</th>
                            <th scope="col">JUDUL</th>
                            <th scope="col">PROGRESS</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from dashboard order by id desc";
                        $q2 = mysqli_query($koneksi, $sql2);

                        while ($r2 = mysqli_fetch_array($q2)) {
                            $idkerma = $r2['idkerma'];
                            $judul = $r2['judul'];
                            $progress = $r2['progress'];
                            ?>
                            <tr>
                                <td scope="row">
                                    <?php echo $idkerma ?>
                                </td>
                                <td scope="row">
                                    <?php echo $judul ?>
                                </td>
                                <td scope="row">
                                    <?php echo $progress ?>
                                </td>
                                <td scoppe="row">
                                    <button type="button" class="btn btn-info">View</button>
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    </theaad>
                </table>

                <script>$(document).ready(function () {
                        $('#example').DataTable();
                    });
                </script>
            </div>
        </div>

    </div>

</body>

</html>