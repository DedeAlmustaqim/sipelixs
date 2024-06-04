<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
<base href=".<?php echo base_url() ?>">
    <meta charset="utf-8">
    <meta name="author" content="SIKON">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Pelaporan Konflik Sosial Kabupaten Barito Timur">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>public/images/bartim.png">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/dashlite.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/theme.css?ver=3.2.3">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="<?= base_url() ?>" class="logo-link mb-2">
                                <img class="logo-light logo-img logo-img-lg" src="<?php echo base_url() ?>public/images/bartim.png"  alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="<?php echo base_url() ?>public/images/bartim.png"  alt="logo-dark">
                            </a>
                            <h3>SIKON</h3>
                            <h6>Sistem Informasi Pelaporan Konflik Sosial</h6>
                            <h6>Kabupaten Barito Timur</h6>
                        </div>
                        
                        <?php $this->renderSection('auth') ?>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3 fs-13px" href="#">Dasar Hukum</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3 fs-13px" href="#">Kebijakan Privasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3 fs-13px" href="#">Bantuan</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                        
                                        <p class="text-soft"> &copy; 2024 Digital Native by <a href="https://wa.me/085248457510?text= " target="_blank">Dede Almustaqim</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <script>var BASE_URL="<?= base_url() ?>"</script>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url() ?>public/assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>public/assets/js/scripts.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>public//js_digital_native/app.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>/public//js_digital_native/service.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>

   

</html>