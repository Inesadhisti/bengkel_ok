<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/tiket.inc.php';
	$eks = new Tiket($db);

	$eks->nopol = $_POST['nopol'];
	$eks->nama_driver = $_POST['nama_driver'];
	$eks->nama_mekanik = $_POST['nama_mekanik'];
	$eks->km_unit = $_POST['km_unit'];
	$eks->keluhan = $_POST['keluhan'];
	$eks->tanggal_servis = $_POST['tanggal_servis'];
	$eks->status = $_POST['status'];

	
	if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
};
</script>
<?php
	}
	
	else{
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
			  <li><a href="tiket.php"><span class="fa fa-wrench"></span> Data Service</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-wrench"></span> Tambah Data Service</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">


			    <div class="form-group">
				    <label for="nopol">Nopol</label>
				    <select class="form-control" id="nopol" name="nopol">
					<?php
					$conn = mysqli_connect("localhost", "root", "", "tiket_spx");
					$result = mysqli_query($conn, "SELECT * FROM unit");
					print_r($result);
					?>
					<?php
					$i = 0;
					while ($row = mysqli_fetch_array($result)) {
					?>
 					<option value="<?= $row["no_unit"]; ?>"><?= $row["nopol"]; ?></option>
					<?php
 					$i++;
					}
					?>
					</select>
				</div>



				<div class="form-group">
				    <label for="nama_driver">Nama Driver</label>
				    <input type="text" class="form-control" id="nama_driver" name="nama_driver"  required >
				</div>


				   <div class="form-group">
				    <label for="nama_mekanik">Nama Mekanik</label>
				    <select class="form-control" id="nama_mekanik" name="nama_mekanik">
					<?php
					$conn = mysqli_connect("localhost", "root", "", "tiket_spx");
					$result = mysqli_query($conn, "SELECT * FROM mekanik");
					print_r($result);
					?>
					<?php
					$i = 0;
					while ($row = mysqli_fetch_array($result)) {
					?>
 					<option value="<?= $row["no_mekanik"]; ?>"><?= $row["nama_mekanik"]; ?></option>
					<?php
 					$i++;
					}
					?>
					</select>
				  </div>


				<div class="form-group">
				    <label for="km_unit">KM Unit</label>
				    <input type="text" class="form-control" id="km_unit" name="km_unit"  required >
				</div>


				<div class="form-group">
				    <label for="keluhan">Keluhan</label>
				    <input type="text" class="form-control" id="keluhan" name="keluhan"  required >
				</div>



				
				  
				  <div class="form-group">
				    <label for="tanggal_servis">Tanggal Service</label>
				    <input type="text" class="form-control" id="tanggal_servis" name="tanggal_servis" value="<?php echo $date = date('d-m-Y'); ?>" required >
				  </div>
				 
				   


				  <div class="form-group">
				    <label for="status">Status</label>
				    <input type="text" class="form-control" id="status" name="status"  required >
				  </div>
				  
				  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='tiket.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
				</div>
				</div>
			  
		  </div>
		</div>

		
		
		<?php
include_once 'footer.php';
?>