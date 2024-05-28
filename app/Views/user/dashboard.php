<?= $this->extend('layout/template_user') ?>
<?= $this->section('content') ?>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title"><?= $title ?></h3>
            <div class="nk-block-des text-soft">
                <p>Selamat Datang <?= $userData['name'] ?></p>
            </div>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><button data-bs-toggle="modal" data-bs-target="#modalReport" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>Buat Laporan</span></button></li>
                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-list"></em><span>Status Laporan</span></a></li>
                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-question"></em></em><span>Layanan</span></a></li>

                    </ul>
                </div><!-- .toggle-expand-content -->
            </div><!-- .toggle-wrap -->
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div>
<div class="row g-gs">

    <!-- <div class="col-md-6 col-xxl-4">
        <div class="card card-bordered h-100">
            <div class="card-inner border-bottom">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Riwayat </h6>
                    </div>
                    <div class="card-tools">
                        <a href="#" class="link">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <div class="card-inner">
                <div class="timeline">
                    <h6 class="timeline-head">November, 2019</h6>
                    <ul class="timeline-list">
                        <li class="timeline-item">
                            <div class="timeline-status bg-primary is-outline"></div>
                            <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                            <div class="timeline-data">
                                <h6 class="timeline-title">Submited KYC Application</h6>
                                <div class="timeline-des">
                                    <p>Re-submitted KYC form.</p>
                                    <span class="time">09:30am</span>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-status bg-primary"></div>
                            <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                            <div class="timeline-data">
                                <h6 class="timeline-title">Submited KYC Application</h6>
                                <div class="timeline-des">
                                    <p>Re-submitted KYC form.</p>
                                    <span class="time">09:30am</span>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-status bg-pink"></div>
                            <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                            <div class="timeline-data">
                                <h6 class="timeline-title">Submited KYC Application</h6>
                                <div class="timeline-des">
                                    <p>Re-submitted KYC form.</p>
                                    <span class="time">09:30am</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
    </div> -->


    <div class="col-xl-12 col-xxl-12">
        <div class="card card-bordered card-full">
            <div class="card-inner border-bottom">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Laporan Anda</h6>
                    </div>
                    <div class="card-tools">
                        <!-- <a href="#" class="link">Lihat Semua</a> -->
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="reportTable">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Nama Terlapor</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Lampiran</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Status</th>
    
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div><!-- .card -->
    </div><!-- .col -->
</div>
<!-- Modal Form -->
<div class="modal fade" id="modalReport">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Laporan</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form id="reportForm" method="POST" class="form-validate is-alter">
                    <input type="text" hidden value="<?= $userData['id'] ?>" name="user_id" id="user_id">
                    <div class="form-group">
                        <label class="form-label" for="nm_terlapor">Nama Terlapor</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="nm_terlapor" name="nm_terlapor" required data-msg="Isi isian ini">
                        </div>
                    </div>
                    <h5>Lokasi Kejadian</h5>
                    <hr>
                    <div class="form-group">
                        <label class="form-label" for="id_kec">Kecamatan</label>
                        <div class="form-control-wrap ">
                            <div class="form-control-select">
                                <select class="form-control" id="id_kec" name="id_kec" required data-msg="Isi isian ini">
                                    <option value="">Pilih Kecamatan</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="id_desa">Desa</label>
                        <div class="form-control-wrap ">
                            <div class="form-control-select">
                                <select class="form-control" id="id_desa" name="id_desa" required data-msg="Isi isian ini">
                                    <option value="">Pilih Desa</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="alamat">Alamat</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" id="alamat" name="alamat" required data-msg="Isi isian ini"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="deskripsi">Deskripsi singkat</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required data-msg="Isi isian ini"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customFileLabel">Lampiran</label>
                        <div class="form-control-wrap">
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="lampiran" name="lampiran" required data-msg="Isi isian ini">
                                <label class="form-file-label" for="lampiran">Pilih File</label>
                            </div>
                        </div>
                        <small class="">Ukuran Maksimal 1 Mb, Format JPG/PNG/PDF</small>
                    </div>
                    <div class="form-group">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-lg btn-danger ">Batal</button>
                        <button type="submit" class="btn btn-lg btn-primary ">Kirim</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Periksa kembali isian Anda sebelum Kirim</span>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>