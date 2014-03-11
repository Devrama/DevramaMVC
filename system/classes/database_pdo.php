<?php if(!defined('FROM_INDEX')) exit('Invalid Access'); ?>
<?php 

final class DMVCPdo {

	private $dbh;
	
	public function __construct($host, $name, $user, $password) {
		
		$dsn = 'mysql:dbname='.$name.';host='.$host;
		
		try {
	 	   $this->dbh = new PDO($dsn, $user, $password);
		} catch (PDOException $e) {
	    	trigger_error('Connection failed: ' . $e->getMessage());
		}
				
	}
	
	public function execute($query, $args = null){
		$manual_commit = $this->dbh->beginTransaction();
		$sth = $this->dbh->prepare($query);
		if($sth !== FALSE){
			if($manual_commit === TRUE){
				
				if(!empty($args)) $exe_result = $sth->execute($args);
				else $exe_result = $sth->execute();
				
				if($exe_result === TRUE){
					$pos = strpos(trim(strtolower($query)), 'insert');
					if($pos ==  0){
						$lastInsertId = $this->dbh->lastInsertId();
						if($this->dbh->commit() === TRUE){
							return $lastInsertId;
						}
						else {
							print_r($this->dbh->errorInfo());
							var_dump(debug_backtrace());
							return FALSE;
						}
					}
					else return TRUE;	
				}
				else {
					print_r($this->dbh->errorInfo());
					var_dump(debug_backtrace());
					return FALSE;
				}
				
			}
			else{
				print_r($this->dbh->errorInfo());
				var_dump(debug_backtrace());
				return FALSE;
			} 
	
		}
		else {
			print_r($this->dbh->errorInfo());
			var_dump(debug_backtrace());
			return FALSE;
		}
		
		
	}
	
	public function getObj($query, $args = null){
		$manual_commit = $this->dbh->beginTransaction();
		$sth = $this->dbh->prepare($query);
		if($sth !== FALSE){
			if($manual_commit === TRUE){
				
				if(!empty($args)) $exe_result = $sth->execute($args);
				else $exe_result = $sth->execute();
				
				if($exe_result === TRUE){
					$obj = $sth->fetchObject();
					if($this->dbh->commit() === TRUE){
						if(!empty($obj)) return $obj;
						else return null;
					}
					else {
						print_r($this->dbh->errorInfo());
						var_dump(debug_backtrace());
						return FALSE;
					}
				}
				else if($this->dbh->errorCode() == '00000'){
					return null;
				}
				else {
					print_r($this->dbh->errorInfo());
					var_dump(debug_backtrace());
					return FALSE;
				}
					
				
			}
			else {
				print_r($this->dbh->errorInfo());
				var_dump(debug_backtrace());
				return FALSE;
			}
			 
		}
		else {
			print_r($this->dbh->errorInfo());
			var_dump(debug_backtrace());
			return FALSE;
		}
		
		
	}
	
	public function getObjArray($query, $args = null){
		$manual_commit = $this->dbh->beginTransaction();
		$sth = $this->dbh->prepare($query);
		if($sth !== FALSE){
			if($manual_commit === TRUE){
				
				if(!empty($args)) $exe_result = $sth->execute($args);
				else $exe_result = $sth->execute();
				
				
				if($exe_result === TRUE){
					$arr_obj = $sth->fetchAll(PDO::FETCH_CLASS);
					if($this->dbh->commit() === TRUE){
						if(!empty($arr_obj)) return $arr_obj;
						else return null;
					}
					else {
						print_r($this->dbh->errorInfo());
						var_dump(debug_backtrace());
						return FALSE;
					}
				}
				else if($this->dbh->errorCode() == '00000'){
					return array();
				}
				else {
					print_r($this->dbh->errorInfo());
					var_dump(debug_backtrace());
					return FALSE;
				}
					
				
			}
			else {
				print_r($this->dbh->errorInfo());
				var_dump(debug_backtrace());
				return FALSE;
			}
			 
		}
		else {
			print_r($this->dbh->errorInfo());
			var_dump(debug_backtrace());
			return FALSE;
		}
		
		
	}
	


}



?>
