<?= $this->extend('layout/template_auth') ?>

<?= $this->section('auth') ?>
<div class="card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Verifikasi Akun diperlukan</h5>
                <div class="nk-block-des">
                    <p>Periksa Email <?= $email ?> kami telah mengirimkan link verifikasi</p>
                </div>
            </div>
        </div>
        <form>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email</label>
                </div>
                <div class="form-control-wrap">
                    <input type="text" disabled class="form-control form-control-lg" id="default-01" value="<?= $email ?>">
                </div>
            </div>
            <div class="form-group">
                <small class="">Belum mendapatkan link verifikasi ?</small>
                <button onclick="onProgress(this)" class="btn btn-lg btn-dark btn-block">Kirim ulang link verifikasi</button>
            </div>
        </form>
        <div class="form-note-s2 text-center pt-4">
            <a href="<?= base_url() ?>login"><strong>Kembali ke login</strong></a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>