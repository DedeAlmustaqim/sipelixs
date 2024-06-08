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
    showReportSkpd()
    showMonitoring()
    showMonitoringSkpd()

    $.ajax({
        url: BASE_URL + 'service/get_unit',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, item) {
                $('#id_unit_forward').append('<option value="' + item.id + '">' + item.nm_unit + '</option>');
            });
        }
    });

    const quillRespond = new Quill('#editor_respond', {
        theme: 'snow'
    });

    quillRespond.on('text-change', (delta, oldDelta, source) => {
        if (source == 'user') {
            // Get the current HTML content
            const currentHtml = quillRespond.root.innerHTML;

            // Update the output
            document.getElementById('catatan_petugas').textContent = currentHtml;
            console.log(currentHtml)
        }
    });


});

function catatan(selectedUnit, selectedPetugas) {

    const quill = new Quill('#editor', {
        theme: 'snow'
    });
    // HTML content
    const html = `
        <p>Diteruskan Kepada Petugas <strong> `+ selectedPetugas + ` </strong>Unit Kerja ` + selectedUnit + ` </p>
        `;

    // Set the initial content
    quill.clipboard.dangerouslyPasteHTML(html);
    document.getElementById('catatan_forward').textContent = html;
    quill.on('text-change', (delta, oldDelta, source) => {
        if (source == 'user') {
            // Get the current HTML content
            const currentHtml = quill.root.innerHTML;

            // Update the output
            document.getElementById('catatan_forward').textContent = currentHtml;
            console.log(currentHtml)
        }
    });


}

$('#id_unit_forward').change(function () {
    var id = $(this).val();

    // Menghapus opsi yang ada dalam dropdown 'desa'
    $('#id_petugas_forward').empty();

    // Menambahkan opsi default kembali ke dropdown 'desa'
    $('#id_petugas_forward').append('<option value="">Pilih Petugas</option>');
    $.ajax({
        url: BASE_URL + 'service/get_petugas/' + id,
        dataType: 'json',
        success: function (data) {

            $.each(data, function (index, item) {
                $('#id_petugas_forward').append('<option value="' + item.id + '">' + item.nama + '</option>');
            });
        }
    });

});

$('#id_petugas_forward').change(function () {
    var selectedUnit = $('#id_unit_forward option:selected').text();
    var selectedPetugas = $('#id_petugas_forward option:selected').text();
    catatan(selectedUnit, selectedPetugas)
})


function showReport() {
    $('#reportTableAdmin').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
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
            "url": BASE_URL + "admin/json_report",
        },
        "columns": [
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[0] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[11] + '</div>'
                }
            },

            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[2] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
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
                "data": function (data) {
                    return '<div class="text-left"><small>' + konversiFormatTanggal(data[8]) + '</small></div>'
                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-center"><span class="' + data[16] + '">' + data[15] + '</span></div>'
                }
            },
            {

                "orderable": false,
                "data": function (data,) {
                    return '<div class="dropdown">'
                        + '<a href="#" class="btn btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false"><span>Aksi</span><em class="icon ni ni-chevron-down"></em></a>'
                        + '<div class="dropdown-menu  mt-1" style="">'
                        + '<ul class="link-list-plain">'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="showDetailReport(this)">Detail</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="forwardReport(this)">Teruskan</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="rejectReport(this)">Tolak </a></li>'
                        + '</ul>'
                        + '</div>'
                        + '</div>'
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

function showReportSkpd() {
    $('#reportTableSkpd').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
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
            "url": BASE_URL + "skpd/json_report",
        },
        "columns": [
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[0] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[11] + '</div>'
                }
            },

            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[2] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
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
                "data": function (data) {
                    return '<div class="text-left"><small>' + konversiFormatTanggal(data[8]) + '</small></div>'
                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-center"><span class="' + data[16] + '">' + data[15] + '</span></div>'
                }
            },
            {

                "orderable": false,
                "data": function (data,) {
                    return '<div class="dropdown">'
                        + '<a href="#" class="btn btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false"><span>Aksi</span><em class="icon ni ni-chevron-down"></em></a>'
                        + '<div class="dropdown-menu  mt-1" style="">'
                        + '<ul class="link-list-plain">'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="showDetailReport(this)">Detail</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="acceptReport(this)">Tanggapi</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="showReplyTable(this)">Riwayat</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="rejectReport(this)">Tolak </a></li>'
                        + '</ul>'
                        + '</div>'
                        + '</div>'
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

function showMonitoring() {

    $('#monitoringTableAdmin').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
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
            "url": BASE_URL + "admin/json_monitoring",
        },
        "columns": [
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[0] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[11] + '</div>'
                }
            },

            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[2] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[6] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
                    var petugas = data[18] || '<span class="text-danger">Tidak Ada</span>'
                    return '<div class="text-left">' + petugas + '</div>'
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
                "data": function (data) {
                    return '<div class="text-left"><small>' + konversiFormatTanggal(data[8]) + '</small></div>'
                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-center"><span class="' + data[16] + '">' + data[15] + '</span></div>'
                }
            },
            {

                "orderable": false,
                "data": function (data,) {
                    if (data[10] == 4) {
                        return '<div class="text-center"><button type="button" class="btn btn-dim btn-primary" data-id="' + data[0] + '" onclick="showDetailReport(this)">Detail</a></div>'
                    }
                    return '<div class="dropdown">'
                        + '<a href="#" class="btn btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false"><span>Aksi</span><em class="icon ni ni-chevron-down"></em></a>'
                        + '<div class="dropdown-menu  mt-1" style="">'
                        + '<ul class="link-list-plain">'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="showDetailReport(this)">Detail</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="forwardReport(this)">Ganti Petugas</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="showReplyTable(this)">Monitoring</a></li>'
                        + '</ul>'
                        + '</div>'
                        + '</div>'
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

function showMonitoringSkpd() {

    $('#monitoringTableSkpd').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
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
            "url": BASE_URL + "skpd/json_monitoring",
        },
        "columns": [
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[0] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[11] + '</div>'
                }
            },

            {
                "orderable": false,
                "data": function (data) {
                    return '<div class="text-left">' + data[2] + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data) {
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
                "data": function (data) {
                    return '<div class="text-left"><small>' + konversiFormatTanggal(data[8]) + '</small></div>'
                }
            },
            {
                "orderable": false,
                "data": function (data,) {
                    return '<div class="text-center"><span class="' + data[15] + '">' + data[17] + '</span></div>'
                }
            },
            {

                "orderable": false,
                "data": function (data,) {
                    if (data[10] == 4) {
                        return '<div class="text-center"><button type="button" class="btn btn-dim btn-primary" data-id="' + data[0] + '" onclick="showDetailReport(this)">Detail</a></div>'
                    }
                    return '<div class="dropdown">'
                        + '<a href="#" class="btn btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false"><span>Aksi</span><em class="icon ni ni-chevron-down"></em></a>'
                        + '<div class="dropdown-menu  mt-1" style="">'
                        + '<ul class="link-list-plain">'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="showDetailReport(this)">Detail</a></li>'
                        + '<li><a style="cursor: pointer;" data-id="' + data[0] + '" onclick="showReplyTable(this)">Riwayat</a></li>'
                        + '</ul>'
                        + '</div>'
                        + '</div>'
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

function forwardReport(elem) {
    var id = $(elem).data("id");
    $("#id_unit_forward").select2({
        dropdownParent: $("#modalForwardReport")
    });
    $("#id_konflik_forward").val(id)
    $('#modalForwardReport').modal('show')
}

$('#formForwardReport').on('submit', function (e) {
    e.preventDefault();
    var postData = new FormData($("#formForwardReport")[0]);
    $.ajax({
        type: "post",
        url: BASE_URL + "admin/report",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            if (data.success == false) {
                toastr.clear();
                if (data.id_konflik_forward) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.id_konflik_forward + '</p>', 'error');
                }
                if (data.id_unit_forward) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.id_unit_forward + '</p>', 'error');
                }

                if (data.id_petugas_forward) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.id_petugas_forward + '</p>', 'error');
                }
                if (data.catatan_forward) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.catatan_forward + '</p>', 'error');
                }

            } else if (data.success == true) {

                Swal.fire('Berhasil', 'Laporan telah diteruskan', 'success');
                showReport()
                showMonitoring()
                $('#modalForwardReport').modal('hide')
            }
        },
    });
    return false;
});



function showReplyTable(elem) {
    var id = $(elem).data("id");

    Swal.fire({
        title: 'Memuat Data',
        text: '',
        icon: 'success',
        showConfirmButton: false,
        allowOutsideClick: false,
        timer: 1000, // durasi dalam milidetik (contoh: 3000ms = 3 detik)
        didOpen: () => {
            Swal.showLoading();
        }
    })
    $.ajax({
        "url": BASE_URL + "service/get_reply/" + id,
        dataType: 'json',
        success: function (data) {
            $('#modalViewReply').modal('show');
            $('#showReply').html('');
            $.each(data, function (index, item) {
                if (item.lampiran_petugas) {
                    var lampiran = `<a target="_blank" href="` + item.lampiran_petugas + `"><span class="badge bg-secondary">Lihat Lampiran</span></a>`
                } else {
                    var lampiran = `<span class="badge bg-danger">Tidak ada Lampiran</span>`
                }
                $('#showReply').append(`<li class="nk-support-item">
                
                <div class="nk-support-content">
                    <div class="title">
                    <span>`+ konversiFormatTanggal(item.created_at) + `&nbsp;&nbsp;` + lampiran + `<br> Oleh ` + item.nama + `</span>
                        <span class="badge badge-dot badge-dot-xs bg-warning ms-1 `+ item.class + `">` + item.ket + `</span>
                    </div>
                    `+ item.catatan_petugas + `
                   
                </div>
            </li>`);
            });
        }
    });


}

function showDetailReport(elem) {
    var id = $(elem).data("id");
    Swal.fire({
        title: 'Memuat Data',
        text: '',
        icon: 'success',
        showConfirmButton: false,
        allowOutsideClick: false,
        timer: 1000, // durasi dalam milidetik (contoh: 3000ms = 3 detik)
        didOpen: () => {
            Swal.showLoading();
        }
    })
    $.ajax({
        "url": BASE_URL + "service/show_detail_report/" + id,
        dataType: 'json',
        success: function (data) {
            $('#modalDetailReport').modal('show');
            $('#showDetailReport').html('');

            var petugas = data.petugas || "<span class='text-danger'>Belum Ada</span>";
            var nip = data.nip || "<span class='text-danger'>Belum Ada</span>";
            var nm_unit = data.nm_unit || "<span class='text-danger'>Belum Ada</span>";
            var catatan_petugas = data.catatan_petugas || "<span class='text-danger'>Belum Ada</span>";
            var lampiran_petugas = data.lampiran_petugas || "<span class='text-danger'>Belum Ada</span>";

            $('#showDetailReport').append(`<table class="table table-borderedless">
            <tbody>
            <tr>
            <td class="bg-dark text-white" colspan="2" class="text-center"><h6>Pelapor</h6></td>
            </tr>
            <tr>
            <td width="40%">Nama</td>
            <td>`+ data.name + `</td>
            </tr>
            <tr>

            
            <tr>
            <td>No. Hp</td>
            <td>`+ data.no_hp + `</td>
            </tr>
            <tr>

            <tr>
            <td>Alamat</td>
            <td>`+ data.alamat_user + `</td>
            </tr>
            <tr>

            <tr >
            <td class="bg-dark text-white" colspan="2" class="text-center"><h6>Terlapor</h6></td>
            </tr>

            <tr>
            <td>Nama</td>
            <td>`+ data.nm_terlapor + `</td>
            </tr>
            <tr>

            <tr>
            <td>Alamat</td>
            <td>`+ data.alamat + `</td>
            </tr>
            <tr>

            <tr>
            <td>Kecamatan</td>
            <td>`+ data.nm_kec + `</td>
            </tr>
            <tr>

            <tr>
            <td>Desa/Kelurahan</td>
            <td>`+ data.nm_desa + `</td>
            </tr>
            <tr>

            <tr >
            <td class="bg-dark text-white" colspan="2" class="text-center"><h6>Laporan</h6></td>
            </tr>

            <tr>
            <td>Deskripsi</td>
            <td>`+ data.deskripsi + `</td>
            </tr>
            <tr>

            <tr>
            <td>Lampiran</td>
            <td><a class="btn btn-primary" target="_blank" href="`+ data.lampiran + `">Lihat Lampiran</a></td>
            </tr>
            <tr>

            <tr>
            <td>Dilaporkan pada</td>
            <td>`+ konversiFormatTanggal(data.laporan_dibuat) + `</td>
            </tr>
            <tr>
            <td>Petugas</td>
            <td>`+ petugas + `</td>
            </tr>
            <tr>
            <td>Status</td>
            <td><span class="`+ data.class + `">` + data.ket + `</span></td>
            </tr>
            
            </tbody>
            </table>`);
        }
    });


}

function rejectReport(elem) {
    var id = $(elem).data("id");
    Swal.fire({
        title: 'Tolak ?',
        text: "Tolak Laporan ini ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Tolak!'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: BASE_URL + 'admin/reject_report/' + id,
                type: "GET",
                data: {
                    id: id,
                },
                success: function (data) {
                    Swal.fire('Berhasil!', 'Laporan telah ditolak.', 'success');

                },
                error: function () {

                    Swal.fire('Gagal!', 'Terjadi kesalahan .', 'error');
                }
            });

        }
    });
}

function acceptReport(elem) {
    var id = $(elem).data("id");

    $("#id_konflik_respond").val(id)
    $('#modalRespondReport').modal('show')
}

$('#formRespondReport').on('submit', function (e) {
    e.preventDefault();
    var postData = new FormData($("#formRespondReport")[0]);
    $.ajax({
        type: "post",
        url: BASE_URL + "skpd/report",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            if (data.success == false) {
                toastr.clear();
                if (data.id_konflik_respond) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.id_konflik_respond + '</p>', 'error');
                }
                if (data.catatan_petugas) {
                    NioApp.Toast('<h5>Gagal Simpan Data</h5><p class="text-danger">' + data.catatan_petugas + '</p>', 'error');
                }

                if (data.status_reply) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.status_reply + '</p>', 'error');
                }
                if (data.lampiran_petugas) {
                    NioApp.Toast('<h5>Gagal Tambah Data</h5><p class="text-danger">' + data.lampiran_petugas + '</p>', 'error');
                }

            } else if (data.success == true) {

                Swal.fire('Berhasil', 'Laporan telah diteruskan', 'success');
                showReportSkpd()
               
                $('#modalRespondReport').modal('hide')
            }
        },
    });
    return false;
});