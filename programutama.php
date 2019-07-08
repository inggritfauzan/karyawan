<?php 
 
    session_start();
    
    $mysqli = new mysqli('localhost', 'root', '', 'karyawan') or die (mysqli_error($mysqli));
    
    $update = false;
    $id = '';
    $nama = '';
    $tanggal_lahir = '';
    $alamat ='';
    $jenis_kelamin='';   
    
    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        
        $mysqli->query("INSERT INTO datakaryawan VALUES ('$id','$nama','$tanggal_lahir','$alamat','$jenis_kelamin')") or die ($mysqli->error);
        
        $_SESSION['message']="data berhasil disimpan";
        $_SESSION['msg_type']= "success";
        
        header("location:index.php");
    }
    
    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM datakaryawan WHERE id=$id") or die($mysqli->error());
        
        $_SESSION['message']="data berhasil dihapus";
        $_SESSION['msg_type']="danger";
        
        header("location:index.php");
    }
    
    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM datakaryawan WHERE id=$id") or die($mysqli->error());
        if (count($result)==1){
            $row = $result->fetch_array();
            $id = $row['id'];
            $nama = $row['nama'];
            $tanggal_lahir = $row['tanggal_lahir'];
            $alamat = $row['alamat'];
            $jenis_kelamin = $row['jenis_kelamin'];
        }
    }
    
    if (isset($_POST['update'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        
        $mysqli->query("UPDATE datakaryawan SET nama='$nama', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jenis_kelamin='$jenis_kelamin' WHERE id=$id") 
        or die($mysqli->error());
        
        $_SESSION['message']="data berhasil di update";
        $_SESSION['msg_type']="warning";
        
        header("location:index.php");
    }