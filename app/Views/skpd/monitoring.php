<?= $this->extend('layout/template_admin') ?>
<?= $this->section('content') ?>

<div class="row g-gs">



    <div class="col-xl-12 col-xxl-12">
        <div class="card card-bordered card-full">
            <div class="card-inner border-bottom">
                <div class="row">
                    <div class="col-6">
                        <h6 class="title">Monitoring Laporan</h6>
                    </div>

                </div>

                <div class="table-responsive mt-4">
                    <table class="table wrap table-bordered table-striped " id="monitoringTableSkpd">
                    <thead class="table-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" width="15%">Nama Pelapor</th>
                                <th scope="col" width="15%">Terlapor</th>
                                <th scope="col" width="20%">Catatan</th>
                                <th scope="col" width="15%">Petugas</th>
                                <th scope="col">Lampiran Pelapor</th>
                                <th scope="col" width="15%">Dibuat pada</th>
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
<div class="modal fade" tabindex="-1" id="modalForwardReport">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Teruskan Laporan Konflik</h5>
            </div>
            <div class="modal-body">
                <form id="formForwardReport" class="gy-3" method="POST">
                    <input type="text" hidden id="id_konflik_forward" name="id_konflik_forward">
                    <div class="row g-3 align-center">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Unit Kerja</label>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" id="id_unit_forward" name="id_unit_forward" required>
                                        <option value="">Pilih</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Petugas</label>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" id="id_petugas_forward" name="id_petugas_forward" required>
                                        <option value="">Pilih Petugas</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <div class="quill-minimal" id="editor">

                                        </div>
                                        <textarea hidden id="catatan_forward" name="catatan_forward"></textarea>
                                    </div>
                                </div>
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
<?= $this->endSection() ?>