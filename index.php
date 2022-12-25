<?php
include_once 'header.php';
include_once 'includes/tiket.inc.php';

$pro = new Tiket($db);
$stmt = $pro->readmen();
$stmt2 = $pro->countAll();
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

		
		  </ol>
			
		 
			<!--DATA LOG ADMIN-->
			<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Info Admin</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">

                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Username</th>
                                <th>:</th>
                                <td><?php echo $_SESSION["username"]?></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>:</th>
                                <td><?php echo $_SESSION["nama_user"] ?></td>
                            </tr>
                            
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-6">


                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Last Login</th>
                                <th>:</th>
                                
                                <td><?php echo $date = date('d-m-Y |  H:i:s'); ?></td>
                            </tr>

                
                            </tbody>
                        </table>

				


                    </div>
                </div>


<br>
<br>
<br>

				<meta name="viewport" content="width=device-width, initial-scale=1">
				<style>
					.img {
  					vertical-align: middle;
  					width: 150px;
  					height: 150px;
  					border-radius: 50%;
  					display:block;
  					margin:0 auto 10px
					}
				</style>
					<img src="images/spx.png" alt="img" class="img">

<br>
<br>
<br>
<br>
<br>
<br>
<br>

            </div>
        </div>
    </div>
				
			
		</div>
		</div>
		
		<footer class="text-center">&copy; Aulia Arif 2022</footer>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>
	<script src="js/canvasjs.min.js"></script>
	<script type="text/javascript">
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Data Service"
				},
				data: [{
					type: "column",
					dataPoints: [
					<?php 
					$conn = mysql_connect("localhost","root","");
					mysql_select_db("tiket_spx",$conn); 
					
						$query=mysql_query("SELECT * FROM mekanik ");					
						while($row=mysql_fetch_assoc($query)){
							 $id     = $row['no_mekanik']; $inama     = $row['nama_mekanik'];
							 
							 
							 $data = mysql_fetch_array(mysql_query("SELECT count(no_mekanik) as jumlah FROM tiket where no_mekanik='$id'"));
							 $jumlah = $data['jumlah'];
							 
							 ?>
						{ y: <?php echo $jumlah ?>, label: "<?php echo "$inama"; ?>" },
						<?php } ?>
					]
				}]
			});
			chart.render();
		}
	</script>
	</body>
</html>