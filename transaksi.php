<?php
include_once("config.php");
$mt_id = "";
$tanggal = "";
$mh_id = "";
$income = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id         = $_GET['id'];
    $transaksi  = "delete from ujian.trx_income where unique_id = $id";
    $q1         = mysqli_query($mysqli, $transaksi);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    // echo $id;
    // die();
    $transaksi  = "select mt_id, tanggal, mh_id, income from ujian.trx_income where unique_id = $id";
    // echo $transaksi;
    // die();
    $q1         = mysqli_query($mysqli, $transaksi);
    // $r1         = mysqli_fetch_array($q1);
    while ($r1 = mysqli_fetch_array($q1)) {
        $mt_id        = $r1['mt_id'];
        $tanggal      = $r1['tanggal'];
        $mh_id     = $r1['mh_id'];
        $income   = $r1['income'];
    }

    if ($mt_id == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $mt_id     = $_POST['mt_id'];
    $tanggal      = $_POST['tanggal'];
    $mh_id     = $_POST['mh_id'];
    $income    = $_POST['income'];

    if ($mt_id && $tanggal && $mh_id && $income) {
        if ($op == 'edit') {
            // echo "masuk edit";
            // die();
            $transaksi = "update ujian.trx_income set mt_id = '$mt_id', tanggal = '$tanggal', mh_id= '$mh_id', income = '$income' where unique_id='$id'";
            $q1 = mysqli_query($mysqli, $transaksi);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else {
            $transaksi = "INSERT INTO ujian.trx_income(mt_id, tanggal, mh_id, income) values($mt_id, '$tanggal', $mh_id, $income)";
            $q1 = mysqli_query($mysqli, $transaksi);
            if ($q1) {
                $sukses = "Berhasil Memasukkan Data baru";
            } else {
                $error = "Gagal Memasukkan Data Baru";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        $(function() {
            $("#date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="res.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#" style="font-size: xx-large;">Shuai BARBERSHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="icon">
                <i class="fas fa-glasses"></i>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding: 0 30px;">
                <ul class="navbar-nav ">
                    <li class="nav-item" style="padding: 0 30px;">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <a class="nav-link text-white" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item" style="padding: 0 30px;">
                        <a class="nav-link text-white" href="tren.php">Tren Rambut</a>
                    </li>
                    <li class="nav-item dropdown" style="padding: 0 20px;">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item " href="transaksi.php">Transaksi</a></li>
                            <li><a class="dropdown-item " href="http://localhost/phpmyadmin/index.php?route=/sql&db=ujian&table=master_haircut&pos=0">Upgrade</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        .mx-auto {
            width: 800px;
        }
    </style>
    <div class="mx-auto" style="margin-top: 120px;">
        <div class="card">
            <div class="card-header">
                Laporan Keuangan
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=transaksi.php"); //5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=transaksi.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="mt_id" class="col-sm-2 col-form-label">Id Haircut</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mt_id" name="mt_id" value="<?php echo $mt_id ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mh_id" class="col-sm-2 col-form-label">Id Cabang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mh_id" name="mh_id" value="<?php echo $mh_id ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="income" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="uang" id="income" name="income" value="<?php echo $income ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {

                // Format mata uang.
                $('.uang').mask('000.000.000', {
                    reverse: true
                });

            })
        </script>

        <div class="card" style="margin-top: 50px;">
            <div class="card-header">
                Data Laporan Keuangan
            </div>
            <div class="card-body">
                <table class="table">
                    <tread>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id Haircut</th>
                            <th scope="col">Id Cabang</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tread>
                    <tbody>
                        <?php
                        $transaksi1 = "SELECT unique_id, mt_id, tanggal, mh_id, income
                    FROM ujian.trx_income";
                        $q2 = mysqli_query($mysqli, $transaksi1);
                        $urut = 1;

                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['unique_id'];
                            $mt_id = $r2['mt_id'];
                            $tanggal = $r2['tanggal'];
                            $mh_id = $r2['mh_id'];
                            $income = $r2['income'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $mh_id ?></td>
                                <td scope="row"><?php echo $mt_id ?></td>
                                <td scope="row"><?php echo $tanggal ?></td>
                                <td scope="row"><?php echo $income ?></td>
                                <td scope="row">
                                    <a href="transaksi.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="transaksi.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Delete?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>