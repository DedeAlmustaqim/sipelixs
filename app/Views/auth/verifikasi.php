<?= $this->extend('layout/template_auth') ?>

<?= $this->section('auth') ?>
<div class="card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">Kode OTP diperlukan</h5>
                <div class="nk-block-des">
                    <p>Periksa WA dengan Nomor <?= $noHp ?> yang telah kami kirimkan Kode OTP</p>
                </div>
            </div>
        </div>
        <form id="formOTP" method="POST">
            <div class="form-group">
                
                <div class="form-control-wrap">
                    <input type="text" hidden class="form-control form-control-lg" id="no_hp_otp" name="no_hp_otp" value="<?= $noHp ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Kode OTP</label>
                </div>
                <div class="form-control-wrap">
                    <input type="text"  class="form-control form-control-lg" required maxlength="6" minlength="6" id="kode_otp" name="kode_otp" >
                </div>
                <small>Masukkan 6 Digit Kode OTP yang telah kami kirimkan</small>
            </div>
            <script>
                document.getElementById('kode_otp').addEventListener('input', function(e) {
                    this.value = this.value.replace(/\D/g, ''); // Remove any non-numeric characters
                });
            </script>
            <div class="form-group">
                <!-- <small class="">Belum mendapatkan link Kode OTP ?</small> -->
                <button type="submit" class="btn btn-lg btn-dark btn-block">Kirim</button>
            </div>
        </form>
        <div class="form-note-s2 text-center pt-4">
            <a href="<?= base_url() ?>login"><strong>Kembali ke login</strong></a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>