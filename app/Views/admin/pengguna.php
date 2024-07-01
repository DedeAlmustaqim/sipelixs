<?= $this->extend('layout/template_admin') ?>
<?= $this->section('content') ?>

<div class="row g-gs">



    <div class="col-xl-12 col-xxl-12">
        <div class="card card-bordered card-full">
            <div class="card-inner border-bottom">
                <div class="row">
                    <div class="col-6">
                        <h6 class="title">Pengguna</h6>
                    </div>

                </div>

                <div class="table-responsive mt-4">
                    <table class="table wrap table-bordered table-striped " id="penggunaTableAdmin">
                    <thead class="table-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" width="25%">Nama</th>
                                <th scope="col" width="25%">Alamat</th>
                                <th scope="col" width="15%">No HP</th>
                                <th scope="col" width="15%">Status</th>
                          
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


        </div><!-- .card -->

    </div><!-- .col -->

</div>


<?= $this->endSection() ?>