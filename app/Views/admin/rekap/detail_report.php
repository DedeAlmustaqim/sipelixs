<!DOCTYPE html>
<html>

<head>
    <title>Laporan Detail</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin-top: 30;
            margin-left: 80px;
            margin-right: 80px;
            margin-bottom: 30px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 40;
            right: 40px;
            height: 30px;

            /** Extra personal styles **/
            color: #000000;
            text-align: center;
            line-height: 30px;
        }

        table {
            border-collapse: collapse;
            font-size: 14px;
        }



        footer {
            position: fixed;
            bottom: -10px;
            left: 0px;
            right: 0px;
            height: 40px;

            /** Extra personal styles **/
            color: #000000;
            text-align: left;
            line-height: 35px;
        }

        h1 {
            display: block;
            font-size: 24px;
            margin-top: 0.2em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h2 {
            display: block;
            font-size: 12;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h3 {
            display: block;
            font-size: 1.0em;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h4 {
            display: block;
            font-size: 0.8em;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .text_td {
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 8px;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            padding: 2;
        }

        .text_utama {
            font-family: "Times New Roman", Times, serif;
            font-size: 18px;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            /* padding: 2; */
        }

        .text-kecil {
            font-family: "Times New Roman", Times, serif;
            font-size: 10;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            /* padding: 2; */
        }


        .text-center {

            text-align: center;
        }

        .text-right {

            text-align: right;
        }

        .text-left {

            text-align: left;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>


<body>


    <h2 class="text-center">LAPORAN KONFLIK </h2>
    <br>

    <table border="0" cellpadding="4" width="100%" class="text_utama">
        <tr>
            <td colspan="2">
                <h2><u>PELAPOR</u></h2>
            </td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Nama</td>
            <td class="text-left" width="">: <b> <?= $data->name ?></b></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">No. HP</td>
            <td class="text-left" width="">: <?= $data->no_hp ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Alamat</td>
            <td class="text-left" width="">: <?= $data->alamat_user ?></td>
        </tr>

    </table>
    <br>
    <table border="0" cellpadding="4" width="100%" class="text_utama">
        <tr>
            <td colspan="2">
                <h2><u>TERLAPOR</u></h2>
            </td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Nama</td>
            <td class="text-left" width="">: <b><?= $data->nm_terlapor ?></b></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">No. HP</td>
            <td class="text-left" width="">: <?= $data->no_hp ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Alamat</td>
            <td class="text-left" width="">: <?= $data->alamat ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Kecamatan</td>
            <td class="text-left" width="">: <?= $data->nm_kec ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Desa/Kelurahan</td>
            <td class="text-left" width="">: <?= $data->nm_desa ?></td>
        </tr>

    </table>
    <br>
    <table border="0" cellpadding="4" width="100%" class="text_utama">
        <tr>
            <td colspan="2">
                <h2><u>LAPORAN</u></h2>
            </td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Kategori</td>
            <td class="text-left" width="">: <?= $data->kategori ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Deskripsi</td>
            <td class="text-left" width="">: <?= $data->deskripsi ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Dilaporkan pada</td>
            <td class="text-left" width="">: <?= konversiFormatTanggal($data->laporan_dibuat) ?></td>
        </tr>

        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Ditindak oleh</td>
            <td class="text-left" width="">: <?= $data->nm_unit ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Petugas</td>
            
            <td class="text-left" width="">: <?= $data->petugas ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Status</td>
            <td class="text-left" width="">: <?= $data->ket ?></td>
        </tr>
        <tr class="text-center text_utama">
            <td class="text-left" width="30%">Lampiran Laporan</td>
            <td class="text-left" width=""><img height="80px" src="<?= $qr_code ?>" alt="QR Code"><br><small>Scan untuk melihat Lampiran</small></td>
        </tr>

    </table>
    <br>
    <h2><u>TINDAK LANJUT</u></h2>
    <br>
    <?php

    foreach ($reply as $d) {


    ?>
        <table border="0" cellpadding="4" width="100%" class="text_utama">
            <tr style="vertical-align: top;">
                <td colspan="2" >
                    <b><?= konversiFormatTanggal($d->created_at) ?></b>
                </td>
            </tr>
            <tr class="text-center text_utama" style="vertical-align: top;">
                <td class="text-left" width="70%">Oleh <b><?= $d->nama ?></b><br> <?= $d->nm_unit ?><br><br><?= $d->catatan_petugas ?></td>
                <td>
                    <?php if ($d->qr_code !== "Tidak ada lampiran") : ?>
                        <img height="80px" src="<?= $d->qr_code ?>" alt="QR Code"><br ><div class="text-kecil">Scan untuk melihat lampiran</div>
                    <?php else : ?>
                        <?= $d->qr_code ?>
                    <?php endif; ?>
                    
                </td>
            </tr>
            


        </table>
        <hr>
    <?php
    } ?>

    <footer>
        <table width="100%">
            <tr>
                <td width="85%">
                    <i><u>
                            <font size="10px">Printed by SIPELIKS <?php echo date("d-m-Y") ?> <?php echo date("H:i:s") ?> WIB</font>
                        </u></i>
                </td>
                <td>
                    <i><u>
                            <font size="10px"><?php echo base_url() ?></font>
                        </u></i>
                </td>
            </tr>
    </footer>
</body>

</html>