<?= $this->extend('layout/template_auth') ?>

<?= $this->section('auth') ?>
<div class="card bg-dark">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title text-white">Login Administrator</h4>
                <div class="nk-block-des">
                    
                </div>
            </div>
        </div>
        <form action="<?= base_url() ?>admin/login" class="form-validate is-alter " novalidate="novalidate" method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label text-white" for="default-01">Username</label>
                </div>
                <div class="form-control-wrap">
                    <input type="text" class="form-control form-control-lg" id="username" name="username" data-msg="Isi isian ini" required placeholder="Masukkan Email">
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label text-white" for="password">Password</label>
                    <a class="link link-primary link-sm text-white" href="html/pages/auths/auth-reset-v2.html">Lupa Password?</a>
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
                <button class="btn btn-lg btn-light btn-block">Login</button>
            </div>
        </form>
       
    </div>
</div>
<?= $this->endSection() ?>