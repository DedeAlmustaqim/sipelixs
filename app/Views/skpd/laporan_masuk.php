<?= $this->extend('layout/template_admin') ?>
<?= $this->section('content') ?>

<div class="row g-gs">



    <div class="col-xl-12 col-xxl-12">
        <div class="card card-bordered card-full">
            <div class="card-inner border-bottom">
                <div class="row">
                    <div class="col-6">
                        <h6 class="title">Laporan Masuk</h6>
                    </div>

                </div>

                <div class="table-responsive  mt-2">
                    <table class="table wrap table-bordered table-striped" id="reportTableSkpd">
                        <thead class="table-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" width="15%">Nama Pelapor</th>
                                <th scope="col" width="15%">Terlapor</th>
                                <th scope="col" width="20%">Deskripsi</th>
                                <th scope="col">Lampiran Pelapor</th>
                                <th scope="col" width="12%">Dibuat pada</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


        </div><!-- .card -->

    </div><!-- .col -->

</div>

<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="modalRespondReport">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tanggapi Laporan Konflik</h5>
            </div>
            <div class="modal-body">
                <form id="formRespondReport" class="gy-3" method="POST">
                    <input type="text" hidden id="id_konflik_respond" name="id_konflik_respond">


                    <div class="row g-3 align-center">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-label">Catatan</label>
                                <!-- <span class="form-note">Optional</span> -->
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-inner">
                                        <!-- Create the editor container -->
                                        <div class="quill-minimal" id="editor_respond">

                                        </div>
                                        <textarea hidden id="catatan_petugas" name="catatan_petugas"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="customFileLabel">Lampiran</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" id="lampiran_petugas" name="lampiran_petugas" required data-msg="Isi isian ini">
                                    <label class="form-file-label" for="lampiran_petugas">Pilih File</label>
                                </div>
                            </div>
                            <small class="">Ukuran Maksimal 1 Mb, Format JPG/PNG/PDF</small>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-control-xs custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="status_reply" name="status_reply">
                                <label class="custom-control-label" for="status_reply">Tandai Selesai</label>
                            </div>
                        </div>

                    </div>

                    <div class="form-group float-end">
                        <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-lg btn-warning" data>Batal</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalDetailReport">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Laporan Konflik</h5>
            </div>
            <div class="modal-body">
                <div id="showDetailReport"></div>
                <div class="form-group float-end">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-lg btn-warning" data>Tutup</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalViewReply">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title">Catatan dan Lampiran Petugas</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div id="showReply"></div>
            </div>
            
        </div>
    </div>
</div>
<?= $this->endSection() ?>