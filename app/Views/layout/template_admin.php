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
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger me-sm-2 d-lg-none">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="<?php echo base_url() ?>public/images/bartim.png" srcset="<?php echo base_url() ?>public/images/bartim.png 2x" alt="logo-dark">
                            </a><span style="font-size: 25px;"><b> SIKON</b></span>
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
                                    <a href="<?= base_url() ?>/admin/laporan_masuk" class="nk-menu-link nk">
                                        <span class="nk-menu-text">Laporan Masuk</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="<?= base_url() ?>/admin/monitoring" class="nk-menu-link nk">
                                        <span class="nk-menu-text">Monitoring Laporan</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-text">Pengaturan</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-text">Auth Pages</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-login.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-register.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-reset.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-success.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                                </li>
                                                <li class="nk-menu-item has-sub">
                                                    <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Classic Version - v2</span></a>
                                                    <ul class="nk-menu-sub">
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-login-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                                        </li>
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-register-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                                        </li>
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-reset-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                                        </li>
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-success-v2.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nk-menu-item has-sub">
                                                    <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">No Slider Version - v3</span></a>
                                                    <ul class="nk-menu-sub">
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-login-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                                        </li>
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-register-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                                        </li>
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-reset-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                                        </li>
                                                        <li class="nk-menu-item">
                                                            <a href="html/pages/auths/auth-success-v3.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item has-sub">
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
                                            </ul><!-- .nk-menu-sub -->
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/_blank.html" class="nk-menu-link"><span class="nk-menu-text">Blank / Startup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/terms-policy.html" class="nk-menu-link"><span class="nk-menu-text">Terms / Policy</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-header-menu -->
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                <li class="dropdown chats-dropdown">
                                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                        <div class="icon-status icon-status-na"><em class="icon ni ni-chat"></em></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                        <div class="dropdown-head">
                                            <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                            <a href="#">Setting</a>
                                        </div>
                                        <div class="dropdown-body">
                                            <ul class="chat-list">
                                                <li class="chat-item">
                                                    <a class="chat-link" href="html/apps-chats.html">
                                                        <div class="chat-media user-avatar">
                                                            <span>IH</span>
                                                            <span class="status dot dot-lg dot-gray"></span>
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">Iliash Hossain</div>
                                                                <span class="time">Now</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">You: Please confrim if you got my last messages.</div>
                                                                <div class="status delivered">
                                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- .chat-item -->
                                                <li class="chat-item is-unread">
                                                    <a class="chat-link" href="html/apps-chats.html">
                                                        <div class="chat-media user-avatar bg-pink">
                                                            <span>AB</span>
                                                            <span class="status dot dot-lg dot-success"></span>
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">Abu Bin Ishtiyak</div>
                                                                <span class="time">4:49 AM</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>
                                                                <div class="status unread">
                                                                    <em class="icon ni ni-bullet-fill"></em>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- .chat-item -->
                                                <li class="chat-item">
                                                    <a class="chat-link" href="html/apps-chats.html">
                                                        <div class="chat-media user-avatar">
                                                            <img src="<?php echo base_url() ?>public/images/avatar/b-sm.jpg" alt="">
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">George Philips</div>
                                                                <span class="time">6 Apr</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">Have you seens the claim from Rose?</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- .chat-item -->
                                                <li class="chat-item">
                                                    <a class="chat-link" href="html/apps-chats.html">
                                                        <div class="chat-media user-avatar user-avatar-multiple">
                                                            <div class="user-avatar">
                                                                <img src="<?php echo base_url() ?>public/images/avatar/c-sm.jpg" alt="">
                                                            </div>
                                                            <div class="user-avatar">
                                                                <span>AB</span>
                                                            </div>
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">Softnio Group</div>
                                                                <span class="time">27 Mar</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                <div class="status sent">
                                                                    <em class="icon ni ni-check-circle"></em>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- .chat-item -->
                                                <li class="chat-item">
                                                    <a class="chat-link" href="html/apps-chats.html">
                                                        <div class="chat-media user-avatar">
                                                            <img src="<?php echo base_url() ?>public/images/avatar/a-sm.jpg" alt="">
                                                            <span class="status dot dot-lg dot-success"></span>
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">Larry Hughes</div>
                                                                <span class="time">3 Apr</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">Hi Frank! How is you doing?</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- .chat-item -->
                                                <li class="chat-item">
                                                    <a class="chat-link" href="html/apps-chats.html">
                                                        <div class="chat-media user-avatar bg-purple">
                                                            <span>TW</span>
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">Tammy Wilson</div>
                                                                <span class="time">27 Mar</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                <div class="status sent">
                                                                    <em class="icon ni ni-check-circle"></em>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- .chat-item -->
                                            </ul><!-- .chat-list -->
                                        </div><!-- .nk-dropdown-body -->
                                        <div class="dropdown-foot center">
                                            <a href="html/apps-chats.html">View All</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                        <div class="quick-icon border border-light">
                                            <img class="icon" src="<?php echo base_url() ?>public/images/flags/english-sq.png" alt="">
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                        <ul class="language-list">
                                            <li>
                                                <a href="#" class="language-item">
                                                    <img src="<?php echo base_url() ?>public/images/flags/english.png" alt="" class="language-flag">
                                                    <span class="language-name">English</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <img src="<?php echo base_url() ?>public/images/flags/spanish.png" alt="" class="language-flag">
                                                    <span class="language-name">Español</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <img src="<?php echo base_url() ?>public/images/flags/french.png" alt="" class="language-flag">
                                                    <span class="language-name">Français</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <img src="<?php echo base_url() ?>public/images/flags/turkey.png" alt="" class="language-flag">
                                                    <span class="language-name">Türkçe</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li><!-- .dropdown -->
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
                                                    <span class="lead-text">Abu Bin Ishtiyak</span>
                                                    <span class="sub-text">info@softnio.com</span>
                                                </div>
                                                <div class="user-action">
                                                    <a class="btn btn-icon me-n2" href="html/user-profile-setting.html"><em class="icon ni ni-setting"></em></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner user-account-info">
                                            <h6 class="overline-title-alt">Account Balance</h6>
                                            <div class="user-balance">1,494.23 <small class="currency currency-usd">USD</small></div>
                                            <div class="user-balance-sub">Locked <span>15,495.39 <span class="currency currency-usd">USD</span></span></div>
                                            <a href="#" class="link"><span>Withdraw Balance</span> <em class="icon ni ni-wallet-out"></em></a>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                <li><a class="dark-mode-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
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
                        <div class="nk-footer-copyright"> &copy; 2023 Dashlite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
                        </div>
                        <div class="nk-footer-links">
                            <ul class="nav nav-sm">
                                <li class="nav-item dropup">
                                    <a href="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link text-base" data-bs-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                        <ul class="language-list">
                                            <li>
                                                <a href="#" class="language-item">
                                                    <span class="language-name">English</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <span class="language-name">Español</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <span class="language-name">Français</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="language-item">
                                                    <span class="language-name">Türkçe</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="modal" href="#region" class="nav-link"><em class="icon ni ni-globe"></em><span class="ms-1">Select Region</span></a>
                                </li>
                            </ul>
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
                                    <img src="<?php echo base_url() ?>public/images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url() ?>public/images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
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