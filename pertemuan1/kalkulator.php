<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator</title>
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			font-family: Arial, sans-serif;
			background: #efeeef;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			margin: 0;
		}

		.kalkulator {
			width: 360px;
			background: white;
			padding: 25px;
			border-radius: 15px;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
		}

		.judul {
			text-align: center;
			color: #333;
			margin-top: 0;
			font-size: 22px;
		}

		.bil {
			width: 100%;
			padding: 12px;
			margin-bottom: 10px;
			border: 2px solid #ccc;
			border-radius: 8px;
			font-size: 16px;
		}

		.opt {
			width: 100%;
			padding: 12px;
			margin-bottom: 10px;
			border: 2px solid #ccc;
			border-radius: 8px;
			font-size: 16px;
		}

		.tombol {
			width: 100%;
			padding: 13px;
			background: #9635bd;
			color: white;
			border: none;
			border-radius: 8px;
			font-size: 16px;
			font-weight: bold;
			cursor: pointer;
		}

		.tombol:hover {
			background: #9635bd;
		}
	</style>
</head>
<body>
	<?php 
	if(isset($_POST['hitung'])){
		$bil1 = $_POST['bil1'];
		$bil2 = $_POST['bil2'];
		$operasi = $_POST['operasi'];
		switch ($operasi) {
			case 'tambah':
				$hasil = $bil1+$bil2;
			break;
			case 'kurang':
				$hasil = $bil1-$bil2;
			break;
			case 'kali':
				$hasil = $bil1*$bil2;
			break;
			case 'bagi':
				$hasil = $bil1/$bil2;
			break;			
		}
	}
	?>
	<div class="kalkulator">
		<h2 class="judul">KALKULATOR</h2>
		<form method="post" action="">			
			<input type="text" name="bil1" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Pertama">
			<input type="text" name="bil2" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Kedua">
			<select class="opt" name="operasi">
				<option value="tambah">+</option>
				<option value="kurang">-</option>
				<option value="kali">x</option>
				<option value="bagi">/</option>
			</select>
			<input type="submit" name="hitung" value="Hitung" class="tombol">											
		</form>
		<?php if(isset($_POST['hitung'])){ ?>
			<input type="text" value="<?php echo $hasil; ?>" class="bil">
		<?php }else{ ?>
			<input type="text" value="0" class="bil">
		<?php } ?>			
	</div>
</body>
</html>