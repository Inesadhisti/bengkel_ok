<?php
class Tiket{
  
  private $conn;
  private $table_name = "tiket";


  public $id;
  public $nopol;
  public $nama_driver;
  public $nama_mekanik;
  public $km_unit;
  public $keluhan;
  public $tanggal_servis;
  public $status;
  
  public function __construct($db){
    $this->conn = $db;
  }
  
  
 function insert(){
		
		
		$query = "insert into ".$this->table_name." values('',?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);



		$stmt->bindParam(1, $this->nopol);
		$stmt->bindParam(2, $this->nama_driver);
		$stmt->bindParam(3, $this->nama_mekanik);
		$stmt->bindParam(4, $this->km_unit);
		$stmt->bindParam(5, $this->keluhan);
		$stmt->bindParam(6, $this->tanggal_servis);
		$stmt->bindParam(7, $this->status);

		#$stmt->bindParam(8, $this->id_sparepart);
		#$stmt->bindParam(9, $this->id_pelanggan);
		#$stmt->bindParam(8, $this->qty);
		#stmt->bindParam(9, $this->harga_jasa);


		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	
	function readAll(){

	    $query = "SELECT * FROM tiket
	              JOIN mekanik ON tiket.nama_mekanik=mekanik.nama_mekanik     
	                   
	              #JOIN 213_pelanggan ON tiket.id_pelanggan=213_pelanggan.id_pelanggan
		          #JOIN 213_sparepart ON tiket.id_sparepart=213_sparepart.id_sparepart
		          JOIN unit ON tiket.nopol=unit.nopol";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function readmen(){

		$query = "select tiket.nama_mekanik, count(*) from tiket inner join mekanik on tiket.nama_mekanik = mekanik.nama_mekanik join unit on tiket.nopol=unit.nopol group by tiket.nama_mekanik";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		 $query = "SELECT * FROM " . $this->table_name . " WHERE no_tiket=?";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['no_tiket'];
		$this->nopol = $row['nopol'];
		$this->nama_driver = $row['nama_driver'];
		$this->nama_mekanik = $row['nama_mekanik'];
		$this->km_unit = $row['km_unit'];
		$this->keluhan = $row['keluhan'];
		$this->tanggal_servis = $row['tanggal_servis'];
		$this->status = $row['status'];

	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 

					nopol= :nopol,
					nama_driver= :nama_driver,
					nama_mekanik = :nama_mekanik,
					km_unit = :km_unit,
					keluhan = :keluhan,				
					tanggal_servis = :tanggal_servis,
					status = :status


				WHERE
					no_tiket = :id";

		$stmt = $this->conn->prepare($query);


		$stmt->bindParam(':nopol', $this->nopol);
		$stmt->bindParam(':nama_driver', $this->nama_driver);
		$stmt->bindParam(':nama_mekanik', $this->nama_mekanik);
		$stmt->bindParam(':km_unit', $this->km_unit);
		$stmt->bindParam(':keluhan', $this->keluhan);

		#$stmt->bindParam(':nama', $this->nama);
		#$stmt->bindParam(':sparepart', $this->sparepart);
		#$stmt->bindParam(':qty', $this->qty);
		#$stmt->bindParam(':harga_jasa', $this->harga_jasa);
		$stmt->bindParam(':tanggal_servis', $this->tanggal_servis);
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':id', $this->id);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE no_tiket = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function countAll(){

		$query = "SELECT * FROM tiket
				 
		          JOIN mekanik ON tiket.nama_mekanik=mekanik.nama_mekanik 
		          #JOIN 213_pelanggan ON tiket.id_pelanggan=213_pelanggan.id_pelanggan
		          #JOIN 213_sparepart ON tiket.id_sparepart=213_sparepart.id_sparepart
		          JOIN unit ON tiket.nopol=unit.nopol";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	function hapusell($ax){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE no_tiket in $ax";
		
		$stmt = $this->conn->prepare($query);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>