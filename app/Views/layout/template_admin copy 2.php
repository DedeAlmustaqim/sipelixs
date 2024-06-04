<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href=".<?php echo base_url() ?>public/">
    <meta charset="utf-8">
    <!-- <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers."> -->
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>public/images/bartim.png">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/dashlite.css?ver=3.2.3">
    <!-- <link id="skin-default" rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/theme.css?ver=3.2.3"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/skins/theme-blue.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/assets/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/assets/datatables.net-bs4/css/responsive.dataTables.min.css">
</head>

<body class="nk-body bg-lighter ">
    <?php $akses = session('akses'); ?>
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <?php


            $theme = ($akses == 1) ? '<div class="nk-header is-dark">' : (($akses == 2) ? '<div class="nk-header is-theme">' : '');

            if ($theme) :
            ?>
                <?= $theme ?>
            <?php
            endif;
            ?>

            <div class="container-fluid ">
                <div class="nk-header-wrap ">
                    <div class="nk-menu-trigger me-sm-2 d-lg-none">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-header-brand">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo-dark">
                        </a><span style="font-size: 25px;" class="text-white"><b> SIKON</b></span>
                    </div><!-- .nk-header-brand -->
                    <div class="nk-header-menu ms-auto" data-content="headerNav">
                        <div class="nk-header-mobile">
                            <div class="nk-header-brand">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo-dark">
                                </a>
                                <span style="font-size: 25; font-weight: bold;">SIKON</span>
                            </div>
                            <div class="nk-menu-trigger me-n2">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                        <ul class="nk-menu nk-menu-main ui-s2">
                            <!-- <li class="nk-menu-item has-sub">
                                    <a href="<?= base_url() ?>/admin/dashboard" class="nk-menu-link nk">
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li> -->

                            <!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">

                                <?php
                                $base_url = base_url();
                                $akses = session('akses');
                                $link = ($akses == 1) ? "{$base_url}admin/laporan_masuk" : (($akses == 2) ? "{$base_url}skpd/laporan_masuk" : '');

                                if ($link) :
                                ?>
                                    <a href="<?= $link ?>" class="nk-menu-link nk">
                                        <span class="nk-menu-text">Laporan Masuk</span>
                                    </a>
                                <?php
                                endif;
                                ?>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <?php if (session('akses') == 1) {

                                ?>
                                    <a href="<?= base_url() ?>admin/monitoring" class="nk-menu-link nk">
                                        <span class="nk-menu-text">Monitoring Laporan</span>
                                    </a>
                                <?php
                                } elseif (session('akses') == 2) {

                                ?>
                                    <a href="<?= base_url() ?>skpd/success" class="nk-menu-link nk">
                                        <span class="nk-menu-text">laporan Selesai</span>
                                    </a>
                                <?php
                                } ?>

                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-text">Pengaturan</span>
                                </a>
                                <ul class="nk-menu-sub">

                                    <!-- <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-text">Error Pages</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/errors/404-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Classic</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/errors/504-classic.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Classic</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/errors/404-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">404 Modern</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/errors/504-s1.html" target="_blank" class="nk-menu-link"><span class="nk-menu-text">504 Modern</span></a>
                                                </li>
                                            </ul> -->
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="javascript:void(0);" onclick="onProgress(this)" class="nk-menu-link"><span class="nk-menu-text">Pengguna</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="javascript:void(0);" onclick="onProgress(this)" class="nk-menu-link"><span class="nk-menu-text">Unit Kerja</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="javascript:void(0);" onclick="onProgress(this)" class="nk-menu-link"><span class="nk-menu-text">Petugas</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->

                        </ul><!-- .nk-menu -->
                    </div><!-- .nk-header-menu -->
                    <div class="nk-header-tools">
                        <ul class="nk-quick-nav">

                            <li class="dropdown user-dropdown">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <div class="user-toggle">
                                        <div class="user-avatar sm">
                                            <em class="icon ni ni-user-alt"></em>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                <span>AB</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text"><?= session('name') ?></span>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="dropdown-inner">
                                        <ul class="link-list">
                                            <li><a href="<?= base_url() ?>admin/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li><!-- .dropdown -->
                        </ul><!-- .nk-quick-nav -->
                    </div><!-- .nk-header-tools -->
                </div><!-- .nk-header-wrap -->
            </div><!-- .container-fliud -->
        </div>
        <!-- main header @e -->
        <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <?php $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
        <!-- footer @s -->
        <div class="nk-footer bg-white">
            <div class="container-fluid">
                <div class="nk-footer-wrap">
                    <div class="nk-footer-copyright"> &copy; 2024 Digital Native by <a href="https://wa.me/085248457510?text= " target="_blank">Dede Almustaqim</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- footer @e -->
    </div>
    <!-- wrap @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
   
    <!-- JavaScript -->
    <script>
        var BASE_URL = "<?= base_url() ?>"
    </script>
    <script src="<?php echo base_url() ?>public/assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>public/assets/js/scripts.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>public/assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/editors/quill.css?ver=3.2.3">
    <script src="<?php echo base_url() ?>public/assets/js/libs/editors/quill.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>public/assets/js/editors.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>public//js_digital_native/app.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>public//js_digital_native/admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
</body>

</html>