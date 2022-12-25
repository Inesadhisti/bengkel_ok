<?php
include_once 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/kami.inc.php';
$eks = new kami($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->kami = $_POST['kami'];



	
	if($eks->update()){
		echo "<script>location.href='kami.php'</script>";
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
			  <li><a href="kami.php"><span class="fa fa-eye"></span> Ubah Tentang Aplikasi Kami</a></li>
			  <li class="active"><span class="fa fa-pencil"></span> Ubah Tentang Aplikasi Kami</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Tentang Aplikasi Kami</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">
			    	
				  <div class="form-group">
				    <label for="nama_kader">Tentang Aplikasi Kami</label>
				    <input type="text" class="form-control" id="kami" name="kami" value="<?php echo $eks->kami; ?>">
				  </div>
				  
				
				  <button type="submit" class="btn btn-warning"><span class="fa fa-edit"></span> Ubah</button>
				  <button type="button" onclick="location.href='kami.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
			  
		  </div></div></div>
		  <div class="col-xs-12 col-sm-12 col-md-2">
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>