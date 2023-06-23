<?php
class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //     "nama" => "Renova Ca",
    //     "nrp" => "001",
    //     "email" => "ren@gmail.com",
    //     "jurusan" => "Teknik INformatika"
    //     ],
    //     [
    //         "nama" => "Nuval",
    //         "nrp" => "002",
    //         "email" => "nuv@gmail.com",
    //         "jurusan" => "Teknik Mesin"
    //     ],
    //     [
    //         "nama" => "Ilham",
    //         "nrp" => "003",
    //         "email" => "Il@gmail.com",
    //         "jurusan" => "Management"
    //     ]
    // ];







        // private $dbh; //database handler
        // private $statement; //query

        // public function __construct()
        // {
        //     // data source name
        //     $dsn = 'mysql:host=localhost;dbname=phpmvc';

        //     try {
        //         $this->dbh = new PDO($dsn,'root','');
        //         //code...
        //     } catch (PDOException $e) {
        //         die($e->getMessage());
        //         //throw $th;
        //     }
        // }

    
    
        private $table = 'mahasiswa';
        private $db;

        public function __construct()
        {
            $this->db=new Database;
            # code...
        }
    
        public function getAllMahasiswa()
    {
        // return $this->mhs;


        // $this->statement=$this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->statement->execute();
        // return $this->statement->fetchAll(PDO::FETCH_ASSOC);


        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultset();
    }


    public function getMahasiswaById($id)
    {
      $this->db->query('SELECT * FROM '.$this->table.' WHERE id =:id');
      $this->db->bind('id',$id);
      return  $this->db->single();
    }



    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES('', :nama, :nrp, :email, :jurusan)";
        $this->db->query($query);


        $this->db->bind('nama',$data['nama']);
        $this->db->bind('nrp',$data['nrp']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('jurusan',$data['jurusan']);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id= :id";
        $this->db->query($query);


        $this->db->bind('id',$id);


        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>