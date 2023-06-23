<?php 

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db = DB_NAME;


    private $dbh; //database handler
    private $statement; //query

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];


        try {
            $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
            
        } catch (PDOException $e) {
            die($e->getMessage());
            
        }
    }


     public function query($query)
    {
        $this->statement=$this->dbh->prepare($query);
       
    }

    public function bind($params, $value, $type = null)
    {
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

                default :
                $type = PDO::PARAM_STR;
            }  
        }
        $this->statement->bindValue($params, $value, $type);
    }



    public function execute()
    {
         $this->statement->execute();
       
    }

    public function resultset()
    {
       $this->execute();
       return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }


    public function rowCount()
    {
       return $this->statement->rowCount();
    }
}


?>