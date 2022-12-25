<?php
include_once 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/tiket.inc.php';
$eks = new Tiket($db);

$eks->id = $id;

$eks->readOne();

if($_POST){


	$eks->nopol = $_POST['nopol'];
	$eks->nama_driver = $_POST['nama_driver'];
	$eks->nama_mekanik = $_POST['nama_mekanik'];
	$eks->km_unit = $_POST['km_unit'];
	$eks->keluhan = $_POST['keluhan'];
	$eks->tanggal_servis = $_POST['tanggal_servis'];
	$eks->status = $_POST['status'];

	
	if($eks->update()){
		echo "<script>location.href='tiket.php'</script>";
	} else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};
</script>
<?php
	}
}
?>
		<div class="row">

		  <div class="col-xs-12 col-sm-12 col-md-2">
			<?php
			include_once 'sidebar.php';
			?>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-10">
		  <ol class="breadcrumb">
			  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			  <li><a href="tiket.php"><span class="fa fa-gears"></span> Data Tiket</a></li>
			  <li class="active"><span class="fa fa-pencil"></span> Ubah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Data Tiket</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
				<form method="post">
			    	
				  <div class="form-group">
				    <label for="nopol">Nopol</label>
				    <input type="text" class="form-control" id="nopol" name="nopol" value="<?php echo $eks->nopol; ?>">
				  </div>
				  <div class="form-group">
				    <label for="nama_driver">Nama Driver</label>
				    <input type="text" class="form-control" id="nama_driver" name="nama_driver" value="<?php echo $eks->nama_driver; ?>">
				  </div>
				  <div class="form-group">
				    <label for="nama_mekanik">Nama Mekanik</label>
				    <input type="text" class="form-control" id="nama_mekanik" name="nama_mekanik" value="<?php echo $eks->nama_mekanik; ?>">
				  </div>

				  <div class="form-group">
				    <label for="km_unit">KM Unit</label>
				    <input type="text" class="form-control" id="km_unit" name="km_unit" value="<?php echo $eks->km_unit; ?>">
				  </div>
				  <div class="form-group">
				    <label for="keluhan">Keluhan</label>
				    <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?php echo $eks->keluhan; ?>">
				  </div>
				  <div class="form-group">
				    <label for="tanggal_servis">Tanggal Servis</label>
				    <input type="text" class="form-control" id="tanggal_servis" name="tanggal_servis" value="<?php echo $eks->tanggal_servis; ?>">
				  </div>
				  <div class="form-group">
				    <label for="status">Status</label>
				    <input type="text" class="form-control" id="status" name="status" value="<?php echo $eks->status; ?>">
				  </div>

				
				  <button type="submit" class="btn btn-warning"><span class="fa fa-edit"></span> Ubah</button>
				  <button type="button" onclick="location.href='tiket.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
			  
		  </div></div></div>
		  <div class="col-xs-12 col-sm-12 col-md-2">
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>