<?php

	class Database{

		public $db_host = DB_HOST;
		public $db_user = DB_USER;
		public $db_pass = DB_PASS;
		public $db_name = DB_NAME;

		public $conn;
		public $error;

		public function __construct(){

			$this->connect();
		}

		private function connect(){

			$this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

			if(!$this->conn){
				$this->error="Connection Failed.". $this->conn->connect_error;
			}
		}


		public function select($sql){

			$result = $this->conn->query($sql);

			if($result->num_rows > 0){
				return $result;
			}
			else{
				return false;
			}
		}

		public function insert($sql){

			$insert = $this->conn->query($sql);

			if($insert){
				header("location: index.php?msg=data inserted.");
			}
			else{
				echo "Insertion Failed.";
			}
		}

		public function update($sql){

			$update = $this->conn->query($sql);

			if($update){
				header("location: index.php?msg=data updated.");
			}
			else{
				echo "Updation  Failed.";
			}
		}

		public function delete($sql){

			$delete = $this->conn->query($sql);

			if($delete){
				header("location: index.php?msg=data deleted.");
			}
			else{
				echo "Deletion Failed.";
			}
		}

	}

?>