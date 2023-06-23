$(function() {

    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah data');
    });


    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah data');

        const id = $(this).data('id');
        console.log(id);
        

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data : {id : id},
            method : 'post',
            dataType : 'json',
            success : function(data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp );
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);

                // console.log(data);
            }        
        })
    });


});