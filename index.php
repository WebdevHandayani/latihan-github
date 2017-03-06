<?php
    include "db.php";
	
    if (isset($_GET['id'])){
		$q = "SELECT * FROM tb_mahasiswa 
			  WHERE id='".$connection->real_escape_string($_GET['id'])."'";
		$query = $connection->query($q);
		$edit = $query->fetch_array();
    }
    
    //Daftar Data Mahasiswa
    $q = "SELECT * FROM tb_mahasiswa ORDER BY npm";
    $query = $connection->query($q);
?>
<html>
  <head>
    <title>Akses Database Pakai MySqli</title>
    <link href="style.css" rel="stylesheet">
</head>
<body style="text-align: center;">
        <div class="box form">
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo @$edit['id']?>">
		<div>
                    <label>NPM</label>
                    <input type="text" name="npm" maxlength="10" value="<?php echo @$edit['npm']?>"
                           placeholder="Masukkan NPM Anda..." required>
                </div>
		<div>
                    <label>NAMA</label>
                    <input type="text" name="nama" maxlength="35" value="<?php echo @$edit['nama']?>"
                           placeholder="Masukkan Nama Anda..." required>
                </div>
		<div>
                    <label>JENIS KELAMIN</label>
                    <select name="jk" id="jk">
                        <option value="L" <?php echo ((@$edit['jk']=="L") ? "selected" : "");?>>L</option>
                        <option value="P" <?php echo ((@$edit['jk']=="P") ? "selected" : "");?>>P</option>
                    </select>
                </div>
		<div>
                    <label>Alamat</label>
                    <input type="text" name="alamat" maxlength="15" value="<?php echo @$edit['alamat']?>"
                           placeholder="Masukkan Alamat Anda..." required>
                </div>
		<div>
                    <label>NO. HP</label>
                    <input type="text" name="no_hp" maxlength="14" value="<?php echo @$edit['no_hp']?>"
                           placeholder="Masukkan No. Hp Anda..." required>
                </div>
                <div>
                    <label>&nbsp;</label>
                    <button type="submit">SAVE</button>
                    <a href="index.php">CANCEL</a>
                </div>
            </form>
        </div>
        <div class="box table">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th width="15%">NPM</th>
                    <th width="25%">NAMA</th>
                    <th width="5%">JK</th>
                    <th width="25%">ALAMAT</th>
                    <th width="15%">NO. HP</th>
                    <th width="15%">AKSI</th>
                </tr>
                <?php
                    while ($daftar = $query->fetch_array()){
                        echo "<tr>
                                <td>".$daftar['npm']."</td>
                                <td>".$daftar['nama']."</td>
                                <td>".$daftar['jk']."</td>
                                <td>".$daftar['alamat']."</td>
                                <td>".$daftar['no_hp']."</td>
                                <td align='center'>
                           <a href='index.php?id=".$daftar['id']."'>Ubah</a> | 
                          <a href='delete.php?id=".$daftar['id']."'>Hapus</a>
                                </td>
                              </tr>";
                    }
                ?>
            </table>
		<!-- Apa ku kerja saya ? Dan bagaimana caranya by AkbarAgung -->
        </div>
    </body>
</html>
