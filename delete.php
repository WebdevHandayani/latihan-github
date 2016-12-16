<?php
    include 'db.php';
    
    $id_mahasiswa = $connection->real_escape_string($_GET['id']);
    $connection->query("DELETE FROM tb_mahasiswa
                        WHERE id='".$id_mahasiswa."'");
    header('Location: index.php');
?>
