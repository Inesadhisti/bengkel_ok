<?php
class Mekanik{
  
  private $conn;
  private $table_name = "mekanik";
  #ganti semua 213_mekanik ke mekanik
  
  public $id;
  public $nama_mekanik;
 # public $umur;



  
  public function __construct($db){
    $this->conn = $db;
  }
  
  
 function insert(){
		
		$query = "insert into ".$this->table_name." values('',?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nama_mekanik);
		#$stmt->bindParam(2, $this->umur);

		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY no_mekanik ASC";
		#ganti semua id_mekanik ke no_mekanik
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE no_mekanik=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['no_mekanik'];
		$this->nama_mekanik = $row['nama_mekanik'];
		#$this->umur = $row['umur'];

	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama_mekanik = :nama_mekanik
					

				WHERE
					no_mekanik = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_mekanik', $this->nama_mekanik);
		#$stmt->bindParam(':umur', $this->umur);
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
	
		$query = "DELETE FROM " . $this->table_name . " WHERE no_mekanik = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function countAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY no_mekanik ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	function hapusell($ax){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE no_mekanik in $ax";
		
		$stmt = $this->conn->prepare($query);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>