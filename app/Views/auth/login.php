<?= $this->extend('layout/template_auth') ?>

<?= $this->section('auth') ?>
<div class="card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Login</h4>
                <div class="nk-block-des">
                    <p>Akses panel SIKON menggunakan email dan kata sandi Anda</p>
                </div>
            </div>
        </div>
        <form action="<?= base_url() ?>login" class="form-validate is-alter" novalidate="novalidate" method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email</label>
                </div>
                <div class="form-control-wrap">
                    <input type="email" class="form-control form-control-lg" id="email" name="email" data-msg="Isi isian ini" required placeholder="Masukkan Email">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>
                    <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Lupa Password?</a>
                </div>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg" required data-msg="Isi isian ini" id="password" name="password" placeholder="Masukkan Password">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-dark btn-block">Login</button>
            </div>
        </form>
        <div class="form-note-s2 text-center pt-4"> Belum punya Akun? <a href="<?= base_url() ?>register">Daftar</a></div>
    </div>
</div>
<?= $this->endSection() ?>