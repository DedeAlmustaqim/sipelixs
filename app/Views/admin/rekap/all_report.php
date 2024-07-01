<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin-top: 30;
            margin-left: 30px;
            margin-right: 30px;
            margin-bottom: 30px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 20px;
            right: 20px;
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
            font-size: 12px;
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


    <h3 class="text-center">REKAPITULASI LAPORAN KONFLIK </h3>
<br>
<div class="text-right">Data Terakhir : <?= date_indo(date('Y-m-d')) ?> - <?= date('H:i:s') ?></div><br>
    <table border="1" cellpadding="4" width="100%" class="text_utama">
        <tr class="text-center text_utama">
            <td rowspan="2" width="3%">No.</td>
            <td rowspan="2" width="13%">Pelapor</td>
            <td rowspan="2" width="13%">Terlapor</td>
            <td colspan="6" width="">Laporan Konflik</td>

        </tr>
        <td class="text-center">Kategori</td>
        <td class="text-center">Deskripsi</td>
        <td class="text-center">Lampiran</td>
        <td class="text-center">Dilaporkan pada</td>
        <td class="text-center">Petugas</td>
        <td class="text-center">Status</td>

        <?php
        $no = 1;
        foreach ($data as $d) {


        ?>
            <tr class="text_utama">
                <td class="text-center" style="vertical-align: top;"><?php echo $no++; ?></td>
                <td class="text-left" style="vertical-align: top;"><b><?php echo $d->name; ?></b><br>Alamat : <?php echo $d->alamat_pelapor; ?></td>
                <td class="text-left" style="vertical-align: top;"><b><?php echo $d->nm_terlapor; ?></b>
                    <br>Alamat : <?php echo $d->alamat_terlapor; ?>
                    <br>Kecamatan : <?php echo $d->nm_kec; ?>
                    <br>Kel/Desa : <?php echo $d->nm_desa; ?>
                </td>
                <td class="text-left" style="vertical-align: top;"><?= $d->kategori ?></td>
                <td class="text-left" style="vertical-align: top;"><?= $d->deskripsi ?></td>
                <td class="text-center"><img width="80px" src="<?= $d->qr_code ?>" alt="QR Code"><br><small>Scan untuk melihat Lampiran</small></td>
                <td class="text-left" style="vertical-align: top;"><?= konversiFormatTanggal($d->dibuat) ?></td>
                <td class="text-left" style="vertical-align: top;"><?= $d->petugas ? $d->petugas : '-' ?></td>
                <td class="text-left" style="vertical-align: top;"><?= $d->ket_status ?></td>

            </tr>
        <?php
        } ?>
    </table>
    <br>
    
    <br><br>
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