<?= $this->extend('layout/template_admin') ?>
<?= $this->section('content') ?>

<div class="row g-gs">



    <div class="col-xl-12 col-xxl-12">
        <div class="card card-bordered card-full">
            <div class="card-inner border-bottom">
                <div class="row">
                    <div class="col-6">
                        <h6 class="title">SKPD</h6>
                    </div>

                </div>

                <div class="table-responsive mt-4">
                    <table class="table wrap table-bordered table-striped " id="unitTableAdmin">
                        <thead class="table-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" width="60%">OPD</th>
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

<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="modalShowPetugas">
    <div class="modal-dialog modal-dialog-top modal-xl" role="document">
        <div class="modal-content">
            <button class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </button>
            <div class="modal-header">
                <h5 class="modal-title">Kelola Petugas</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive mt-4">
                    <table class="table wrap table-bordered table-striped " id="PetugasTableAdmin">
                        <thead class="table-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" width="">Username</th>
                                <th scope="col" width="">Nama</th>
                                <th scope="col" width="">No Hp</th>

                                <th scope="col" width="20%"></th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>