<?= $this->extend('layout/template_admin') ?>
<?= $this->section('content') ?>
<div class="nk-block-head nk-block-head-sm">

</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-lg-3 col-sm-6">
            <div class="card h-100 bg-primary">
                <div class="nk-cmwg nk-cmwg1">
                    <div class="card-inner pt-3">
                        <div class="d-flex justify-content-between">
                            <div class="flex-item">
                                <div class="text-white d-flex flex-wrap">
                                    <span class="fs-2 me-1"><?= $selesai ?> Laporan</span>
                                </div>
                                <h6 class="text-white">Selesai</h6>
                            </div>

                        </div>
                    </div><!-- .card-inner -->
                    <div class="nk-ck-wrap mt-auto overflow-hidden rounded-bottom">
                        <div class="nk-cmwg1-ck">
                            <canvas class="campaign-line-chart-s1 rounded-bottom" id="runningCampaign" style="display: block; box-sizing: border-box; height: 70px; width: 294px;" width="294" height="70"></canvas>
                        </div>
                    </div>
                </div><!-- .nk-cmwg -->
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6">
            <div class="card h-100 bg-info">
                <div class="nk-cmwg nk-cmwg1">
                    <div class="card-inner pt-3">
                        <div class="d-flex justify-content-between">
                            <div class="flex-item">
                                <div class="text-white d-flex flex-wrap">
                                    <span class="fs-2 me-1"><?= $proses ?> Laporan</span>
                                </div>
                                <h6 class="text-white">Dalam Proses</h6>
                            </div>

                        </div>
                    </div><!-- .card-inner -->
                    <div class="nk-cmwg1-ck mt-auto">
                        <canvas class="campaign-line-chart-s1 rounded-bottom" id="totalAudience" style="display: block; box-sizing: border-box; height: 70px; width: 294px;" width="294" height="70"></canvas>
                    </div>
                </div><!-- .nk-cmwg -->
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6">
            <div class="card h-100 bg-warning">
                <div class="nk-cmwg nk-cmwg1">
                    <div class="card-inner pt-3">
                        <div class="d-flex justify-content-between">
                            <div class="flex-item">
                                <div class="text-white d-flex flex-wrap">
                                    <span class="fs-2 me-1"><?= $blm ?> Laporan</span>
                                </div>
                                <h6 class="text-white">Belum ditanggapi</h6>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="nk-ck-wrap mt-auto overflow-hidden rounded-bottom">
                        <div class="nk-cmwg1-ck">
                            <canvas class="campaign-bar-chart-s1 rounded-bottom" id="avgRating" style="display: block; box-sizing: border-box; height: 70px; width: 294px;" width="294" height="70"></canvas>
                        </div>
                    </div>
                </div><!-- .nk-cmwg -->
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6">
            <div class="card h-100 bg-danger">
                <div class="nk-cmwg nk-cmwg1">
                    <div class="card-inner pt-3">
                    <div class="d-flex justify-content-between">
                            <div class="flex-item">
                                <div class="text-white d-flex flex-wrap">
                                    <span class="fs-2 me-1"><?= $ditolak ?> Laporan</span>
                                </div>
                                <h6 class="text-white">Ditolak</h6>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="nk-ck-wrap mt-auto overflow-hidden rounded-bottom">
                        <div class="nk-cmwg1-ck">
                            <canvas class="campaign-line-chart-s1 rounded-bottom" id="newSubscriber" style="display: block; box-sizing: border-box; height: 70px; width: 294px;" width="294" height="70"></canvas>
                        </div>
                    </div>
                </div><!-- .nk-cmwg -->
            </div><!-- .card -->
        </div><!-- .col -->
        <!-- <div class="col-xxl-8 col-lg-7">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Performance Overview</h6>
                        </div>
                        <div class="card-tools">
                            <ul class="card-tools-nav">
                                <li><a href="#"><span>Week</span></a></li>
                                <li class="active"><a href="#"><span>Month</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-inner pt-0">
                    <ul class="d-flex justify-content-center flex-wrap gx-3 mb-2">
                        <li class="align-center"><span class="dot" data-bg="#733AEA" style="background: rgb(115, 58, 234);"></span><span class="ms-1">Social</span></li>
                        <li class="align-center"><span class="dot" data-bg="#0FCA7A" style="background: rgb(15, 202, 122);"></span><span class="ms-1">Email</span></li>
                        <li class="align-center"><span class="dot" data-bg="#F2426E" style="background: rgb(242, 66, 110);"></span><span class="ms-1">Courses</span></li>
                        <li class="align-center"><span class="dot" data-bg="#FD9722" style="background: rgb(253, 151, 34);"></span><span class="ms-1">Google Ads</span></li>
                    </ul>
                    <div class="nk-cmwg2-ck">
                        <canvas class="campaign-line-chart-s2" id="performanceOverview" style="display: block; box-sizing: border-box; height: 270px; width: 750px;" width="750" height="270"></canvas>
                    </div>
                    <div class="chart-label-group ms-5">
                        <div class="chart-label">03 Jan</div>
                        <div class="chart-label d-none d-sm-block">10 Jan</div>
                        <div class="chart-label d-none d-sm-block">17 Jan</div>
                        <div class="chart-label d-none d-sm-block">24 Jan</div>
                        <div class="chart-label">31 Jan</div>
                    </div>
                </div>
            </div>
           
        </div>
       
        <div class="col-xxl-4 col-lg-5">
            <div class="card card-full">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Top Channels</h6>
                        </div>
                        <div class="card-tools">
                            <a href="#" class="link">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-inner pt-0">
                    <ul class="gy-4">
                        <li class="justify-between align-center border-bottom border-0 border-dashed">
                            <div class="align-center">
                                <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/google.png" alt=""></div>
                                <div class="ms-2">
                                    <div class="lead-text">Google </div>
                                    <div class="sub-text">SEO &amp; PPC</div>
                                </div>
                            </div>
                            <div class="align-center">
                                <div class="sub-text me-2">70%</div>
                                <div class="progress rounded-pill w-80px">
                                    <div class="progress-bar bg-success rounded-pill" data-progress="70" style="width: 70%;"></div>
                                </div>
                            </div>
                        </li>
                      
                        <li class="justify-between align-center border-bottom border-0 border-dashed">
                            <div class="align-center">
                                <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/instagram.png" alt=""></div>
                                <div class="ms-2">
                                    <div class="lead-text">Instagram </div>
                                    <div class="sub-text">Social Media</div>
                                </div>
                            </div>
                            <div class="align-center">
                                <div class="sub-text me-2">86%</div>
                                <div class="progress rounded-pill w-80px">
                                    <div class="progress-bar bg-primary rounded-pill" data-progress="86" style="width: 86%;"></div>
                                </div>
                            </div>
                        </li>
                     
                        <li class="justify-between align-center border-bottom border-0 border-dashed">
                            <div class="align-center">
                                <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/linkedin.png" alt=""></div>
                                <div class="ms-2">
                                    <div class="lead-text">Linked In </div>
                                    <div class="sub-text">Social Media</div>
                                </div>
                            </div>
                            <div class="align-center">
                                <div class="sub-text me-2">75%</div>
                                <div class="progress rounded-pill w-80px">
                                    <div class="progress-bar bg-danger rounded-pill" data-progress="75" style="width: 75%;"></div>
                                </div>
                            </div>
                        </li>
                        
                        <li class="justify-between align-center border-bottom border-0 border-dashed">
                            <div class="align-center">
                                <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/slack.png" alt=""></div>
                                <div class="ms-2">
                                    <div class="lead-text">Slack </div>
                                    <div class="sub-text">Messanger</div>
                                </div>
                            </div>
                            <div class="align-center">
                                <div class="sub-text me-2">64%</div>
                                <div class="progress rounded-pill w-80px">
                                    <div class="progress-bar bg-info rounded-pill" data-progress="64" style="width: 64%;"></div>
                                </div>
                            </div>
                        </li>
                     
                        <li class="justify-between align-center">
                            <div class="align-center">
                                <div class="user-avatar sq bg-transparent"><img src="./images/icons/campaign/brand/twitter.png" alt=""></div>
                                <div class="ms-2">
                                    <div class="lead-text">Twitter </div>
                                    <div class="sub-text">Social Media</div>
                                </div>
                            </div>
                            <div class="align-center">
                                <div class="sub-text me-2">54%</div>
                                <div class="progress rounded-pill w-80px">
                                    <div class="progress-bar bg-warning rounded-pill" data-progress="54" style="width: 54%;"></div>
                                </div>
                            </div>
                        </li>
                    
                    </ul>
                </div>
            </div>
      
        </div> -->
 

    </div>
</div><!-- .nk-block -->
<?= $this->endSection() ?>