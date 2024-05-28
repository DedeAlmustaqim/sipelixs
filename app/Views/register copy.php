<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href=".<?php echo base_url() ?>/public/landing/.<?php echo base_url() ?>/public/landing/.<?php echo base_url() ?>/public/landing/">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/public/landing/images/favicon.png">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/landing/assets/css/dashlite.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url() ?>/public/landing/assets/css/theme.css?ver=3.2.3">
    
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-lg">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="<?php echo base_url() ?>/public/landing/images/logo.png" srcset="<?php echo base_url() ?>/public/landing/images/logo2x.png 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="<?php echo base_url() ?>/public/landing/images/logo-dark.png" srcset="<?php echo base_url() ?>/public/landing/images/logo-dark2x.png 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Daftar</h5>
                                        <div class="nk-block-des">
                                            <small>Buat Akun agar dapat melakukan Pelaporan Konflik Sosial</small>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="html/pages/auths/auth-success.html" class="form-validate is-alter" novalidate="novalidate">
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
                                            <input type="password" data-msg="Isi isian ini" class="form-control form-control-lg" id="password" placeholder="Masukkan Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox">
                                            <label class="custom-control-label" for="checkbox">Dengan melakukan daftar akun ini anda telah setuju dengan kebijakan privasi kami</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    
                                        <button class="btn btn-lg btn-primary btn-block">Register</button>
                                    </div>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">Option Label</label>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Sudah punya kun ? <a href="html/pages/auths/auth-login.html"><strong>Sign in </strong></a>
                                </div>

                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3 fs-13px" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3 fs-13px" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3 fs-13px" href="#">Help</a>
                                        </li>

                                    </ul><!-- nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2024 Digital Native.</p>
                                </div>
                            </div><!-- nk-block -->
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="<?php echo base_url() ?>/public/landing/images/slides/promo-a.png" srcset="<?php echo base_url() ?>/public/landing/images/slides/promo-a2x.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Dashlite</h4>
                                                <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="<?php echo base_url() ?>/public/landing/images/slides/promo-b.png" srcset="<?php echo base_url() ?>/public/landing/images/slides/promo-b2x.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Dashlite</h4>
                                                <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="<?php echo base_url() ?>/public/landing/images/slides/promo-c.png" srcset="<?php echo base_url() ?>/public/landing/images/slides/promo-c2x.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Dashlite</h4>
                                                <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url() ?>/public/landing/assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>/public/landing/assets/js/scripts.js?ver=3.2.3"></script>
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>/public/landing/images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->

</html>