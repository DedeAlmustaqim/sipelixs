<?= $this->extend('layout/template_admin') ?>
<?= $this->section('content') ?>
<div class="nk-block-head nk-block-head-sm">
    
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row g-gs">
        
        <div class="col-xxl-12">
            <div class="card card-full">
                <div class="nk-ecwg nk-ecwg8 h-100">
                    <div class="card-inner">
                        <div class="card-title-group mb-3">
                            <div class="card-title">
                                <h6 class="title">Sales Statistics</h6>
                            </div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle link link-light link-sm dropdown-indicator" data-bs-toggle="dropdown">Weekly</a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><span>Daily</span></a></li>
                                            <li><a href="#" class="active"><span>Weekly</span></a></li>
                                            <li><a href="#"><span>Monthly</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nk-ecwg8-legends">
                            <li>
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#6576ff"></span>
                                    <span>Total Order</span>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#eb6459"></span>
                                    <span>Cancelled Order</span>
                                </div>
                            </li>
                        </ul>
                        <div class="nk-ecwg8-ck">
                            <canvas class="ecommerce-line-chart-s4" id="salesStatistics"></canvas>
                        </div>
                        <div class="chart-label-group ps-5">
                            <div class="chart-label">01 Jul, 2020</div>
                            <div class="chart-label">30 Jul, 2020</div>
                        </div>
                    </div><!-- .card-inner -->
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
       
        <div class="col-xxl-12">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title"> Laporan Terakhir</h6>
                        </div>
                    </div>
                </div>
                <div class="nk-tb-list mt-n2">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Order No.</span></div>
                        <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                        <div class="nk-tb-col"><span>Amount</span></div>
                        <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95954</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-purple-dim">
                                    <span>AB</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Abu Bin Ishtiyak</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">02/11/2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">4,596.75 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95850</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-azure-dim">
                                    <span>DE</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Desiree Edwards</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">02/02/2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">596.75 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs bg-danger">Cancelled</span>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95812</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-warning-dim">
                                    <img src="./images/avatar/b-sm.jpg" alt="">
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Blanca Schultz</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">02/01/2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">199.99 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95256</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-purple-dim">
                                    <span>NL</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Naomi Lawrence</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">01/29/2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                        </div>
                    </div>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95135</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-success-dim">
                                    <span>CH</span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">Cassandra Hogan</span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">01/29/2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs bg-warning">Due</span>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div>
        
    </div><!-- .row -->
</div><!-- .nk-block -->
<?= $this->endSection() ?>