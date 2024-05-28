
$(document).ready(function () {
    $.ajax({
        url: BASE_URL + 'service/get_kecamatan',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, item) {
                $('#id_kec').append('<option value="' + item.id + '">' + item.nm_kec + '</option>');
            });
        }
    });
});

$('#id_kec').change(function () {
    var id = $(this).val();
    // Menghapus opsi yang ada dalam dropdown 'desa'
    $('#id_desa').empty();

    // Menambahkan opsi default kembali ke dropdown 'desa'
    $('#id_desa').append('<option value="">Pilih Desa</option>');
    $.ajax({
        url: BASE_URL + 'service/get_desa/' + id,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, item) {
                $('#id_desa').append('<option value="' + item.id + '">' + item.nm_desa + '</option>');
            });
        }
    });

});

$('#formRegister').on('submit', function (e) {
    var postData = new FormData($("#formRegister")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "register",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {


            if (data.success == false) {
                toastr.clear();
                if (data.name) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.name + '</p>', 'error');
                }
                if (data.nik) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.nik + '</p>', 'error');
                }

                if (data.no_hp) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.no_hp + '</p>', 'error');
                }
                if (data.email) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.email + '</p>', 'error');
                }
                if (data.alamat) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.alamat + '</p>', 'error');
                }
                if (data.password) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.password + '</p>', 'error');
                }if (data.confirm_password) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.confirm_password + '</p>', 'error');
                }
            } else if (data.success == true) {

                Swal.fire('Pendaftaran Berhasil', '', 'success');
                
               window.location.href=BASE_URL+'/register/verifikasi/'+ data.email
            }

        },

    })
    return false;
});

$('#reportForm').on('submit', function (e) {
    var postData = new FormData($("#reportForm")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "service/report/user",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {


            if (data.success == false) {
                toastr.clear();
                if (data.user_id) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.user_iduser_id + '</p>', 'error');
                }
                if (data.nm_terlapor) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.nm_terlapor + '</p>', 'error');
                }

                if (data.id_kec) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.id_kec + '</p>', 'error');
                }
                if (data.id_desa) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.id_desa + '</p>', 'error');
                }
                if (data.alamat) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.alamat + '</p>', 'error');
                }
                if (data.deskripsi) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.deskripsi + '</p>', 'error');
                }if (data.lampiran) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.lampiran + '</p>', 'error');
                }
            } else if (data.success == true) {

                Swal.fire('Laporan Anda telah dibuat', '', 'success');
                $('#modalTambahPeg').modal('hide');
              
            }

        },

    })
    return false;
});