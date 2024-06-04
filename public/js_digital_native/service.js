
$(document).ready(function () {

    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    showReport()

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
                } if (data.confirm_password) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.confirm_password + '</p>', 'error');
                }
            } else if (data.success == true) {

                Swal.fire('Pendaftaran Berhasil', '', 'success');
                var decodedEmail = atob(encodedEmail);
                window.location.href = BASE_URL + '/register/verifikasi/' + decodedEmail
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
                } if (data.lampiran) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.lampiran + '</p>', 'error');
                }
            } else if (data.success == true) {

                Swal.fire('Laporan Anda telah dibuat', '', 'success');
                $('#reportTable').DataTable().ajax.reload(null, false);
                $('#modalReport').modal('hide');

            }

        },

    })
    return false;
});

$('#filter_status').change(function () {

    // Menghapus opsi yang ada dalam dropdown 'desa'
    showReport();

});


function showReport() {
    var status = $('#filter_status').val()


    $('#reportTable').DataTable({
        processing: true,
        serverSide: true,

        destroy: true,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
        "columnDefs": [{
            "visible": false,

        }],
        "order": [
            [0, 'asc']
        ],

        "language": {
            "lengthMenu": "Tampilkan _MENU_ item per halaman",
            "zeroRecords": "Tidak ada data yang ditampilkan",
            "info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang ditampilkan",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": ">",
                "previous": "<"
            },
        },
        "displayLength": 25,
        "ajax": {
            "url": BASE_URL + "service/report/user/" + status,
        },
        "columns": [

            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-left">' + data[0] + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-left">' + data[2] + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-left">' + data[6] + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-center"><a href="' + data[7] + '" target="_blank" class="btn btn-dim btn-primary">Lihat</a></div>'

                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-center">' + konversiFormatTanggal(data[8]) + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-center"><span class="tb-sub ' + data[11] + ' ">' + data[10] + '</span></div>'


                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    if (data[12] == 0) {
                        return '<div class="text-center"><span class="tb-sub text-danger">Belum Ada </span></div>'
                    } else if (data[12] == 1) {
                        return '<div class="text-center"><a onClick="viewReply(this)" data-id="' + data[0] + '" target="_blank" class="btn btn-dim btn-primary">Lihat</a></div>'

                    }


                }
            },


        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        },


    });


}

function viewReply(elem) {
    var id = $(elem).data("id");
    $('#modalViewReply').modal('show');
    showReplyTable(id)
}


function showReplyTable(id) {

    $.ajax({
        "url": BASE_URL + "service/get_reply/" + id,
        dataType: 'json',
        success: function (data) {
            $('#showReply').html('');
            $.each(data, function (index, item) {
                if (item.lampiran_petugas) {
                    var lampiran = `<a target="_blank" href="`  + item.lampiran_petugas + `"><span class="badge bg-secondary">Lihat Lampiran</span></a>`
                } else {
                    var lampiran = `<span class="badge bg-danger">Tidak ada Lampiran</span>`
                }
                $('#showReply').append(`<li class="nk-support-item">
                
               <div class="nk-support-content">
               <div class="title">
               <span>`+ konversiFormatTanggal(item.created_at) +  `&nbsp;&nbsp;` + lampiran + `<br> Oleh ` + item.nama +`</span>
                   <span class="badge badge-dot badge-dot-xs bg-warning ms-1 `+ item.class + `">` + item.ket + `</span>
               </div>
                    `+ item.catatan_petugas + `
                   
                </div>
            </li>`);
            });
        }
    });


    
}