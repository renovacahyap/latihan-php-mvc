<?php


class About extends Controller{
    public function index($nama="renova", $pekerjaan="pengangguran",$umur="19")
    {
        $data['nama']=$nama;
        $data['pekerjaan']=$pekerjaan;
        $data['umur']=$umur;
        $data['judul']='About Me';

        $this->view('templates/header',$data);

        // echo "Halo Saya $nama, saya $pekerjaan";
        $this->view('about/index',$data);
        $this->view('templates/footer');
    }
    
    public function page()
    {
        $data['judul']='Pages';
        $this->view('templates/header',$data);
        // echo 'About/page';
        $this->view('about/page');

        $this->view('templates/footer');
     
    }

}