<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href=".<?php echo base_url() ?>public/">
    <meta charset="utf-8">
    <meta name="author" content="Digital Native">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fulstack Developer by Dede Almustaqim.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>public/images/bartim.png">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" type="text/css" href="?php echo base_url() ?>public/assets/css/libs/fontawesome-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/dashlite.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/theme.css?ver=3.2.3">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/datatables.net-bs4/css/dataTables.bootstrap4.css?=<?php echo date('Y-m-d H:i:s') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/datatables.net-bs4/css/responsive.dataTables.min.css?=<?php echo date('Y-m-d H:i:s') ?>">
</head>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>

                    </div>
                    <div class="nk-sidebar-brand">
                        <?php if (session('akses') == 1) {

                        ?>
                            <a href="<?= base_url() ?>admin/dashboard" class="logo-link nk-sidebar-logo">
                                <img class="logo-light logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo-dark">
                            </a>

                        <?php
                        } elseif (session('akses') == 2) {

                        ?>
                            <a href="<?= base_url() ?>skpd/dashboard" class="logo-link nk-sidebar-logo">
                                <img class="logo-light logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo-dark">
                            </a>


                        <?php
                        } ?>

                        <span style="font-size: 25px;" class="text-white"><b> SIPELIKS</b></span>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">

                                <li class="nk-menu-item">
                                    <?php if (session('akses') == 1) {

                                    ?>
                                        <a href="<?= base_url() ?>admin/dashboard" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                            <span class="nk-menu-text">Dashboard </span>
                                        </a>

                                    <?php
                                    } elseif (session('akses') == 2) {

                                    ?>
                                        <a href="<?= base_url() ?>skpd/dashboard" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>


                                    <?php
                                    } ?>

                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item">
                                    <?php
                                    $base_url = base_url();
                                    $akses = session('akses');
                                    $link = ($akses == 1) ? "{$base_url}admin/laporan_masuk" : (($akses == 2) ? "{$base_url}skpd/laporan_masuk" : '');

                                    if ($link) :
                                    ?>
                                        <a href="<?= $link ?>" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                            <span class="nk-menu-text">Laporan Masuk</span>
                                        </a>
                                    <?php
                                    endif;
                                    ?>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <?php if (session('akses') == 1) {

                                    ?>
                                        <a href="<?= base_url() ?>admin/monitoring" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                            <span class="nk-menu-text">Monitoring </span>
                                        </a>

                                    <?php
                                    } elseif (session('akses') == 2) {

                                    ?>
                                        <a href="<?= base_url() ?>skpd/monitoring" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                            <span class="nk-menu-text">Hasil Tanggapan</span>
                                        </a>


                                    <?php
                                    } ?>

                                </li><!-- .nk-menu-item -->
                                <?php if (session('akses') == 1) {

                                ?>
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-block-over"></em></span>
                                            <span class="nk-menu-text">Pengaturan</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="<?= base_url() ?>admin/pengguna" class="nk-menu-link"><span class="nk-menu-text">Pengguna</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="<?= base_url() ?>admin/unit"  class="nk-menu-link"><span class="nk-menu-text">Unit Kerja</span></a>
                                            </li>
                                          
                                        </ul><!-- .nk-menu-sub -->
                                    </li><!-- .nk-menu-item -->

                                <?php
                                }  ?>

                                <li class="nk-menu-item">
                                    <a href="<?= base_url() ?>admin/logout" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                        <span class="nk-menu-text">Logout</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="<?php echo base_url() ?>public/images/logo.png" srcset="<?php echo base_url() ?>public/images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="<?php echo base_url() ?>public/images/logo-dark.png" srcset="<?php echo base_url() ?>public/images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">

                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">

                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">

                                                    <div class="user-name dropdown-indicator"><?= session('name') ?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">

                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?= base_url() ?>admin/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
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
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- JavaScript -->
    <script src="<?php echo base_url() ?>public/assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>public/assets/js/scripts.js?ver=3.2.3"></script>
    <script>
        var BASE_URL = "<?= base_url() ?>"
    </script>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/editors/quill.css?ver=3.2.3">
    <script src="<?php echo base_url() ?>public/assets/js/libs/editors/quill.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>/public/assets/datatables.net/js/jquery.dataTables.min.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>/public/assets/datatables.net-bs4/js/dataTables.responsive.min.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>public/assets/js/editors.js?ver=3.2.3"></script>
    <script src="<?php echo base_url() ?>/public/js_digital_native/app.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>/public/js_digital_native/admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
</body>

</html>