<?php
class Database{
    private $host      = DB_HOST;
    private $user      = DB_USER;
    private $pass      = DB_PASS;
    private $dbname    = DB_NAME;

    private $dbh;  //Defines the database handler (dbh) variable in our TRY / CATCH method for creating a new PDO (php data object) instance
    private $error; //Defines the error variable
    private $stmt; //Defines the variable that will hold the database statement

    //__construct method is automatically called on all newly-created objects
    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true, //once connected to DB stay connected to save memory
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION //Throw friendly errors
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    // Prepare the database query
    public function query($query){
	    $this->stmt = $this->dbh->prepare($query);
    }

    //Define placeholder values, actual values, and the data type (like string, or int, etc...)
    public function bind($param, $value, $type = null){
	    if (is_null($type)) {
	        switch (true) {
	            case is_int($value):
	                $type = PDO::PARAM_INT;
	                break;
	            case is_bool($value):
	                $type = PDO::PARAM_BOOL;
	                break;
	            case is_null($value):
	                $type = PDO::PARAM_NULL;
	                break;
	            default:
	                $type = PDO::PARAM_STR;
	        }
	    }
	    $this->stmt->bindValue($param, $value, $type);
        }

        //Execute database query
        public function execute(){
		    return $this->stmt->execute();
        }

        //Return full result set
        public function resultset(){
		    $this->execute();
		    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
         }

        //Return a single record
        public function single(){
		    $this->execute();
		    return $this->stmt->fetch(PDO::FETCH_ASSOC);
         }

        //Get row count
        public function rowCount(){
		    return $this->stmt->rowCount();
        }

        //Get last inserted id
        public function lastInsertId(){
		    return $this->dbh->lastInsertId();
        }

        //Begin a new transaction
        public function beginTransaction(){
		    return $this->dbh->beginTransaction();
        }

        //End a transaction
        public function endTransaction(){
		    return $this->dbh->commit();
        }

        //Rollback and cancel the transaction
        public function cancelTransaction(){
		    return $this->dbh->rollBack();
        }

        //Dumps or removes the info that was in the prepared statement
        public function debugDumpParams(){
		    return $this->stmt->debugDumpParams();
        }

        //Specific Queries
        public function get_all_contacts(){
		  $sql = "SELECT * FROM contact_list order by id ASC";
		  return $this->stmt->query($sql);
        }
}
?>