<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="TugasBesar.css">
    <title>UK2_Zeten</title>
</head>
<body>
    <div class="container">
            <center><h1>Program Menentukan Bilangan Prima</h1></center>
            </div>
        </header>
        <div class="container">
            <form method="POST" action="prima.php">
                <table border="1" align="center" width="50%">
                    <tr>
                        <td width="50%" colspan="1">
                            <h2 align="center">Menentukan Bilangan Prima</h2>
                        </td>
                    </tr>
                    <tr>
                        <td width="60%" colspan="1">
                            <input class="bil" type="number" name="number" placeholder="Masukkan Bilangan">
                        </td>
                    <tr>
                        <td width="50%" colspan="1">
                            <center><input type="submit" name="hitung" value="Submit" class="tombol"/></center>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <center>
        <?php
        if(!empty($_POST['number'])){
            $num=$_POST['number'];
            $status = "Prima";
            for($i=2;$i<= $num-1;$i++){
                if($num % $i == 0){
                    $status = "Bukan Prima";
                    break;
                }
            }
            echo $num. " adalah bilangan " .$status;
        }
        ?>
        </center>
        <footer>
            <h5 align="center">FarahNisa_UK2</h5>
    </footer>
</body>
</html>