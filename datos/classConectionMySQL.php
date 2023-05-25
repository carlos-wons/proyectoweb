<?php
///classConectionMySQL.php
class ConnectionMySQL{
	
	//Definicion de los atributos de la clase
	private $host;
	private $user;
	private $password;
	private $database;
	public $conn;
	
	public function __construct(){
		///llamada a la configuracion de la BD
		require_once "config_db.php";
		$this->host=HOST;
		$this->user=USER;
		$this->password=PASSWORD;
		$this->database=DATABASE;
		
	}
	
	public function CreateConnection(){
		//metodo que crea y retorna la conexion a la BD
		$this->conn = new mysqli($this->host,$this->user,$this->password,$this->database);
		//$this->conn->set_charset("utf-8");
		if($this->conn->connect_error){
			die("Error al conectarse a MYSQL; (".$this->conn->connect_error.")".$this->connect_error);
			
		}

	}

	

	public function CloseConnection(){
		//metodo que cierra la conexion
		$this->conn->close();
	}
	
	public function ExecuteQuery($sql){
		//metodo que ejecuta el quiery y retorna el resultado
		$result = $this->conn->query($sql);
		return $result;
	}
	
	public function GetCountAffectedRows(){
		//filas afectadas
		return $this->conn->affected_rows;
	}
	
	public function GetRows($result){
		//retorna filas
		return $result->fetch_row();
	}
	
	public function SetFreeResult($result){
		//libera la consulta
		$result->free_result();
	}
	



	
}	
?>