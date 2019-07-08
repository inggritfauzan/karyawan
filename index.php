<html>

<head>
    <title> Daftar Karyawan </title>
    <meta charset="utf-8">
    <meta name content="viewport" content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php require_once 'programutama.php';?>
    
    <?php
    if (isset($_SESSION['message'])):?>
    
    <div class="alert" alert-<?=$_SESSION['msg_type']?>">
            
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
    </div>
    <?php endif?>
            
    <div class="container">
    <?php
         $mysqli = new mysqli('localhost', 'root', '', 'karyawan') or die(mysqli_error($mysqli));
         $result = $mysqli->query("SELECT * FROM datakaryawan") or die($mysqli->error);
    ?>
            
        <div class="row justify-content-center">
            <h2> Daftar Karyawan</h2>
            <table class="table">
                <thead>
                    <tr align="center">
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Tanggal_lahir</th>
                        <th>Alamat</th>
                        <th>Jenis_Kelamin</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td align="center"><?php echo $row['id'];?></td>
                    <td align="center"><?php echo $row['nama'];?></td>
                    <td align="center"><?php echo $row['tanggal_lahir'];?></td>
                    <td align="center"><?php echo $row['alamat'];?></td>
                    <td align="center"><?php echo $row['jenis_kelamin'];?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id'];?>"
                                class="btn btn-info">edit</a>
                        
                        <a href="programutama.php?delete=<?php echo $row['id'];?>"
                                class="btn btn-danger">delete</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </table>
        </div>
        
        <?php 
        function pre_r($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
            }
        ?>
        
    <div class="row justify-content-center">
    <form action="programutama.php" method="POST">
        <div class="form-group">
        <label>Id</label>      
        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="Masukkan id">
        </div>
        <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"placeholder="Masukkan nama">
        </div>
        <div class="form-group">
        <label>Tanggal_lahir</label>
        <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $tanggal_lahir; ?>" placeholder="Masukkan tanggal lahir">
        </div>
        <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" placeholder="Masukkan alamat">
        </div>
        <div class="form-group">
        <label>Jenis_kelamin</label>
        <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $jenis_kelamin; ?>"placeholder="Masukkan jenis kelamin">
        </div>
        <div class="form-group">
        <?php
        if ($update == true):
        ?>
        <button type="submit" class="btn btn-info" name="update">update</button>
        <?php else: ?>
        <button type="submit" class="btn btn-primary" name="save">save</button>
        <?php endif; ?>
        </div>
    </form>
    </div>
    </div>
</body>
</html> 