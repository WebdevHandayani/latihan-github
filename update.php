<?php
    include 'db.php';
    
    $npm = $connection->real_escape_string($_POST['npm']);
    $nama = $connection->real_escape_string($_POST['nama']);
    $jk = $connection->real_escape_string($_POST['jk']);
    $alamat = $connection->real_escape_string($_POST['alamat']);
    $no_hp = $connection->real_escape_string($_POST['no_hp']);
    
    if ($_POST['id']!=""){
        $connection->query("UPDATE tb_mahasiswa SET npm='".$npm."', nama='".$nama."',
                                                    jk='".$jk."', alamat='".$alamat."',
                                                    no_hp='".$no_hp."' 
               WHERE id='".$connection->real_escape_string($_POST['id'])."'");
    }else{
        $connection->query("INSERT INTO tb_mahasiswa(npm, nama, jk, alamat, no_hp) 
                                              VALUES('".$npm."', '".$nama."',
                                                     '".$jk."', '".$alamat."',
                                                     '".$no_hp."')");
    }
    header('Location: index.php');
?>
