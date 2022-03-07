
// Jenis kamar code
$('.tombol-edit').on('click', function(){
    var id = $(this).data('id');
    var jenis_kamar = $(this).data('jeniskamar');
    var fasilitas = $(this).data('fasilitas');
    var harga = $(this).data('harga');

    $('#editModal #id').val(id);
    $('#editModal #jenis_kamar').val(jenis_kamar);
    $('#editModal #fasilitas').val(fasilitas);
    $('#editModal #harga').val(harga);
});


$('.tombol-hapus').on('click', function(){
    var id = $(this).data('id');
    $('#deleteModal #id').val(id);
});



// Kamar code
$('.tombol-editKamar').on('click', function(){
    var id = $(this).data('id');
    var nama = $(this).data('nama');

    $('#editModalKamar #id').val(id);
    $('#editModalKamar #nama_kamar').val(nama);

});

$('.tombol-hapusKamar').on('click', function(){
    var id = $(this).data('id');
    $('#deleteModalKamar #id').val(id);
});


// Jenis Makanan code
$('.tombol-editJmakanan').on('click', function(){
    var id = $(this).data('id');
    var jenis_makanan = $(this).data('jenismakanan');

    $('#editModalJenisMakanan #id').val(id);
    $('#editModalJenisMakanan #jenis_makanan').val(jenis_makanan);
});

$('.tombol-hapusJmakanan').on('click', function(){
    var id = $(this).data('id');
    $('#deleteModalJmakanan #id').val(id);
});


// Makanan code
$('.tombol-editMakanan').on('click', function(){
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var harga = $(this).data('harga');

    $('#editModalMakanan #id').val(id);
    $('#editModalMakanan #nama_makanan').val(nama);
    $('#editModalMakanan #harga').val(harga);
});


$('.tombol-hapusMakanan').on('click', function(){
    var id = $(this).data('id');
    $('#deleteModalMakanan #id').val(id);
})


// Pesanan Code
$('.tombol-batal').on('click', function(){
    var id = $(this).data('id');
    $('#cancelModal #id').val(id);
});

$('.tombol-checkin').on('click', function(){
    var idPesan = $(this).data('id');
    var tglPesan = $(this).data('tgl');
    var idTamu = $(this).data('idtamu');
    var jmlKamar = $(this).data('kamar');

    $('#checkinModal #id_pesan').val(idPesan);
    $('#checkinModal #tgl_pesan').val(tglPesan);
    $('#checkinModal #id_tamu').val(idTamu);
    $('#checkinModal #jml_kamar').val(jmlKamar);
});

$('.tombolCheckout').on('click', function(){
    var biaya = $(this).data('biaya');
    var id = $(this).data('id');
    var tglCheckin = $(this).data('tgl');
    var idRecep = $(this).data('recep');
    var idPesan = $(this).data('pesan');
    var idkamar = $(this).data('kamar');
    var idMakanan = $(this).data('makanan');

    $('#checkoutModal #total_bayar').val(biaya);
    $('#checkoutModal #id_checkin').val(id);
    $('#checkoutModal #biaya').val(biaya);
    $('#checkoutModal #tgl_checkin').val(tglCheckin);
    $('#checkoutModal #id_receptionist').val(idRecep);
    $('#checkoutModal #id_pesan').val(idPesan);
    $('#checkoutModal #id_kamar').val(idkamar);
    $('#checkoutModal #id_makanan').val(idMakanan);
});

$('.tombol-editRecep').on('click', function(){
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var noHp = $(this).data('nohp');

    $('#editModalRecep #id_recep').val(id);
    $('#editModalRecep #nama_receptionist').val(nama);
    $('#editModalRecep #no_hp').val(noHp);
});

$('.tombol-hapusRecep').on('click', function(){
    var id = $(this).data('id');
    $('#deleteModalRecep #id').val(id);
});

$('.tombol-editAkunRecep').on('click', function(){
    var id = $(this).data('id');
    var idRecep = $(this).data('idrecep');
    var username = $(this).data('username');
    var password = $(this).data('password');

    $('#editModalAkunRecep #id_akun').val(id);
    $('#editModalAkunRecep #id_receptionist').val(idRecep);
    $('#editModalAkunRecep #username').val(username);
    $('#editModalAkunRecep #password').val(password);
});

$('.tombol-hapusAkunRecep').on('click', function(){
    var id = $(this).data(id);
    $('#deleteModalAkunRecep #id_akun').val(id.id);
});