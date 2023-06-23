<?php 
    class Mahasiswa extends Controller {
        public function index(){
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mhs']=$this->model('Mahasiswa_model')->getAllMahasiswa();
            $this->view('templates/header',$data);
            $this->view('mahasiswa/index',$data);
            $this->view('templates/footer');
        }

        public function detail($id){
            var_dump($id);
            $data['judul'] = 'Detail Mahasiswa';
            $data['mhs']=$this->model('Mahasiswa_model')->getMahasiswaById($id);
            // var_dump($data['mhs']);
            $this->view('templates/header',$data);
            $this->view('mahasiswa/detail',$data);
            $this->view('templates/footer');
        }

        public function tambah()
        {
            if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST)>0) {
              Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('location: '.BASEURL.'/mahasiswa');
              exit;
            }else{
                Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
                header('location: '.BASEURL.'/mahasiswa');
              exit;
            }
        }

        public function hapus($id)
        {
            if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id)>0) {
              Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('location: '.BASEURL.'/mahasiswa');
              exit;
            }else{
                Flasher::setFlash('Gagal', 'dihapus', 'danger');
                header('location: '.BASEURL.'/mahasiswa');
              exit;
            }
        }


        public function getubah()
        {
          echo json_encode( $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
         
          # code...
        }


    }
    
?>