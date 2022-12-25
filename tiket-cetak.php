<?php
session_start();
if (!isset($_SESSION['nama_user'])) {
	echo "<script>location.href='login.php'</script>";
}
// Define relative path from this script to mPDF

$nama_dokumen = 'Data Service'; //Beri nama file PDF hasil.
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']); // Create new mPDF Document

//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<?php
//KONEKSI
$host = "localhost"; //isi dengan host anda. contoh "localhost"
$user = "root"; //isi dengan username mysql anda. contoh "root"
$password = ""; //isi dengan password mysql anda. jika tidak ada, biarkan kosong.
$database = "tiket_spx"; //isi nama database dengan tepat.
$conn = mysqli_connect($host, $user, $password, $database);


#pembelian
$no_tiket = $_GET['id'];
//  echo $id_pembelian;
?>

<style type="text/css">
	h4,
	p {
		text-align: left;
		font-style: bold;
		font-size: 12px
	}

	h1,
	h5,
	h2 {
		text-align: center;
		padding-top: inherit;

	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	table,
	td,
	th {
		border: 1px solid black;
	}

	tbody tr:nth-child(odd) {
		background-color: #ccc;
	}
</style>
<h2>Warehouse Shopee Xpress</h2>
<h5>Jl. Agung Timur 2 Blok O IV No. 17-18 RT 009/011, RT.10/RW.11, Sunter Jaya, Tanjung Priok, Jakarta Utara</h5>
<hr>

<?php
$query = mysqli_query($conn, "SELECT * FROM tiket JOIN mekanik ON tiket.no_mekanik=mekanik.no_mekanik

#JOIN 213_sparepart ON tiket.id_sparepart=213_sparepart.id_sparepart 
JOIN unit ON tiket.nopol=unit.no_unit 
#JOIN 213_pelanggan ON 213_pelanggan.id_pelanggan = tiket.id_pelanggan
where tiket.no_tiket = $no_tiket
ORDER BY no_tiket ASC");
$nm_pelanggan = mysqli_fetch_array($query);
// $service + mysqli_fetch_array($query);
// print($nm_pelanggan['nama']);
?>

<h4> Surat Perintah Kerja ( No Service: <?php echo $nm_pelanggan['no_tiket'] ?> )</h4>
<p align="left">Nama Admin: <?php echo $_SESSION['nama_user'] ?></p>
<p align="left">Tanggal: <?php date_default_timezone_set("Asia/Jakarta");
							echo $date = date('d-m-Y |  H:i:s'); ?> </p>


<table>
	<thead>
		<tr>


                <th>Nopol</th>
                <th>Nama Driver</th>


                <th>Nama Mekanik</th>

                <th>KM Unit</th>
                <th>Keluhan</th>

				<th>Tanggal Servis</th>

		</tr>
	</thead>
	
		<?php


		$sql = mysqli_query($conn, "SELECT * FROM tiket 
		JOIN mekanik ON tiket.no_mekanik=mekanik.no_mekanik 
		#JOIN 213_sparepart ON tiket.id_sparepart=213_sparepart.id_sparepart 

		JOIN unit ON tiket.nopol=unit.no_unit 
		where tiket.no_tiket = $no_tiket 
		ORDER BY no_tiket ASC"); 
		while ($data = mysqli_fetch_assoc($sql)) {


#$sql = mysqli_query($conn, "SELECT * FROM tiket 
#	JOIN mekanik ON tiket.no_mekanik=mekanik.no_mekanik 
#	JOIN 213_sparepart ON tiket.id_sparepart=213_sparepart.id_sparepart 
#	JOIN unit ON tiket.nopol=unit.no_unit 
#	ORDER BY no_tiket ASC");
#	while ($data = mysqli_fetch_assoc($sql)) {

		#$sql = mysqli_query($conn, "SELECT * FROM tiket 
		#JOIN mekanik ON tiket.no_mekanik=mekanik.no_mekanik 
		#JOIN 213_sparepart ON tiket.id_sparepart=213_sparepart.id_sparepart 
		#JOIN 213_pelanggan ON 213_pelanggan.id_pelanggan = tiket.id_pelanggan 
		#JOIN unit ON tiket.nopol=unit.no_unit 
		#where tiket.no_tiket = $tiket 
		#ORDER BY no_tiket ASC"); 
		#while ($data = mysqli_fetch_assoc($sql)) {
		?>

		<tbody>
			<tr>

				<td><?php echo $data['nopol'] ?></td>

				<td><?php echo $data['nama_driver'] ?></td>

				<td><?php echo $data['nama_mekanik'] ?></td>

				<td><?php echo $data['km_unit'] ?></td>
				<td><?php echo $data['keluhan'] ?></td>


				<td><?php echo $data['tanggal_servis'] ?></td>
			</tr>
		</tbody>
		<?php
		}
		?>
	
</table>

<!--CONTOH Code END-->

<?php
$html = ob_get_clean();
ob_end_flush();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", "D");
exit;
?>