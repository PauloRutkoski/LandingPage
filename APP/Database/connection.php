<?php 

    class Connection{
        private $host;
        private $dbname;
        private $user;
        private $pass;

        public function __construct( $host, $dbname, $user, $pass)
        {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->user = $user;
            $this->pass = $pass;
        }

        public function connect()
        {
            try
            {
                
                $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user","$this->pass");
                return $connection;
                
            }
            catch(PDOException $e)
            {
                header("Locatiom:../../index.php?success=0");
            }
        }
    }

?>