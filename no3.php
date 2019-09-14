<p>Form Input</p>
<form action="no3.php" method="get">
	Kata 1 : <input type="text" name="kata1"><br><br>
	Kata 2 : <input type="text" name="kata2"><br><br>
	cari kata : <input type="text" name="cari"><br><br>
	<input type="submit" name="submit" value="Proses">
</form>

<?php
	// Menampilkan input dari form
	if(isset($_GET['submit'])){
		$kata1 = $_GET['kata1'];
		$kata2 = $_GET['kata2'];
		$cari = $_GET['cari'];
		echo "kata 1 : $kata1 <br>";
		echo "kata 2 : $kata2 <br>";
		echo "cari kata : $cari <br>";
		$string = $kata1.$kata2;
		//echo $string;
		$result = substr_count($string, $cari);
		echo "Maka jumlah kata ".$cari." pada kata 1 dan kata 2 adalah $result";
	} else {


	}



?>

<?php
//$string = "bananana";

//$result = substr_count($string, "na");

//echo "Maka jumlah kata na pada adalah $result";
?>
