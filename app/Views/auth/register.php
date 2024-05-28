<?= $this->extend('layout/template_auth') ?>
<?= $this->section('auth') ?>
<div class="card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Daftar</h4>
                <div class="nk-block-des">
                    <p>Buat Akun untuk Melaporkan Konflik Sosial</p>
                </div>
            </div>
        </div>
        <form id="formRegister" class="form-validate is-alter" novalidate="novalidate" method="POST">
            <div class="form-group">
                <label class="form-label" for="name">Nama</label>
                <div class="form-control-wrap">
                    <input type="text" data-msg="Isi isian ini" class="form-control form-control-lg" name="name" id="name" placeholder="Masukkan Nama" required maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="name">NIK</label>
                <div class="form-control-wrap">
                    <input type="text" data-msg="Isi isian ini" class="form-control form-control-lg" name="nik" id="nik" placeholder="Masukkan NIK" required maxlength="16" minlength="16" inputmode="numeric" pattern="\d*">
                </div>
            </div>
            <script>
                document.getElementById('nik').addEventListener('input', function(e) {
                    this.value = this.value.replace(/\D/g, ''); // Remove any non-numeric characters
                });
            </script>
            <div class="form-group">
                <label class="form-label" for="name">Alamat</label>
                <div class="form-control-wrap">
                    <textarea data-msg="Isi isian ini" class="form-control form-control-lg" name="alamat" id="alamat" placeholder="Masukkan Alamat" required maxlength="200" minlength="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="name">NO. Telp/HP/WA</label>
                <div class="form-control-wrap">
                    <input type="text" data-msg="Isi isian ini" class="form-control form-control-lg" name="no_hp" id="no_hp" placeholder="Masukkan NIK" required maxlength="12" minlength="11" inputmode="numeric" pattern="\d*">
                </div>
            </div>
            <script>
                document.getElementById('no_hp').addEventListener('input', function(e) {
                    this.value = this.value.replace(/\D/g, ''); // Remove any non-numeric characters
                });
            </script>
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <div class="form-control-wrap">
                    <input type="email" data-msg="Isi isian ini" data-msg-email="Isi dengan format email yang benar" class="form-control form-control-lg" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
            </div>
            <script>
                document.getElementById('email').addEventListener('input', function(e) {
                    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    if (!emailPattern.test(this.value)) {
                        this.setCustomValidity('Masukkan format email dengan benar');
                    } else {
                        this.setCustomValidity('');
                    }
                });
            </script>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" data-msg="Isi isian ini" class="form-control form-control-lg" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Konfirmasi Password</label>
                <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" data-msg="Isi isian ini" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="Masukkan Password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-control-xs custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox_privasi" name="checkbox_privasi">
                    <label class="custom-control-label" for="checkbox_privasi">Dengan melakukan daftar akun ini anda telah setuju dengan kebijakan privasi kami</label>
                </div>
            </div>

            <div class="form-group">

                <button class="btn btn-lg btn-dark btn-block">Register</button>
            </div>

        </form><!-- form -->
        <div class="form-note-s2 text-center pt-4"> Sudah Punya Akun ? <a href="<?= base_url() ?>login"><strong>Login</strong></a>
        </div>

    </div>
</div>
<?= $this->endSection() ?>