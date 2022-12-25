<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/kami.inc.php';
	$eks = new kami($db);

	$eks->kami = $_POST['kami'];

	
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
			  <li><a href="kami.php"><span class="fa fa-eye"></span> Tentang Aplikasi Kami</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Tentang Aplikasi Kami</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Tentang Aplikasi Kami</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">
				  <div class="form-group">
				    <label for="kami">Tentang Aplikasi Kami</label>
				    <input type="text" class="form-control" id="kami" name="kami" required>
				  </div>
			
				<input type="hidden" id="tgllk" value="" name="tgllk"/>
				  </div>
				  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='kami.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
				</div>
				</div>
			  
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>