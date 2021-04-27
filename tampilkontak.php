<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	//menjalankan session dan mengeksekusi file cek_session.php
    	session_start();
    	include "cek_session.php";
	?>
	<!--menampilkan tulisan dengan format heading 2-->
	<h2>LIST MAHASISWA</h2>
	<!--membuat tabel untuk menampilkan data dari database-->
	<table border="1">
		<tr>
			<td>NO</td>
			<td>NIM</td>
			<td>NAMA</td>
			<td>GENDER</td>
			<td>EMAIL</td>
			<td>ALAMAT</td>
			<td>KOTA</td>
			<td>PESAN</td>
		</tr>
		<?php
			//mengeksekusi file koneksi.php
			include "koneksi.php";
			//menjalankan query pada database
			$sql="SELECT * from mahasiswa1";
			$mahasiswa=mysqli_query($conn,$sql);
			$no=1;
			//menuliskan data hasil query dari database ke tabel
			foreach ($mahasiswa as $row) {
				$jenis_kelamin = $row['JKEL']=='P'?'PEREMPUAN':'Laki_Laki';
				echo "<tr>
				<td>$no</td>
				<td>".$row['id']."</td>
				<td>".$row['NAMA']."</td>
				<td>".$jenis_kelamin."</td>
				<td>".$row['EMAIL']."</td>
				<td>".$row['ALAMAT']."</td>
				<td>".$row['KOTA']."</td>
				<td>".$row['PESAN']."</td>
				</tr>";
				$no++;
			}
		?>
	</table>
	<button><a href="tambahkontak.php">Tambah Data</a></button>
	<button><a href="logout.php">Keluar</a></button>
</body>
</html>