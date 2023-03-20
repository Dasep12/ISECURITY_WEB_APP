<html lang="en">
<head>
        <style>
        body {font-family: sans-serif;
            font-size: 10pt;
        }
        p {	margin: 0pt; }
        table.items {
            border: 0.1mm solid #000000;
        }
        tr { vertical-align: top; }
        .items tr {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        table thead tr { background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }
        .items tr.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }
        .items tr.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }
        .items tr.cost {
            text-align: "." center;
        }
        </style>
</head>
<body>
    <!--mpdf
    <htmlpageheader name="myheader">
    <table width="100%"><tr>
    <td width="50%" style="color:#0000BB; "><span style="font-weight: bold; font-size: 24pt;">I - SECURITY</span>
    </tr></table>
    </htmlpageheader>
    <htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
    Page {PAGENO} of {nb}
    </div>
    </htmlpagefooter>
    <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
    <sethtmlpagefooter name="myfooter" value="on" />
    mpdf-->
    <div style="text-align: center;"><p style="font-size: 25pt;"><u>Riwayat Absensi</u></p></div>
    <!-- <table width="100%" style="font-family: serif;" cellpadding="10"><tr>
    <td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">Data Form:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
    <td width="10%">&nbsp;</td>
    <td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
    </tr></table> -->
    <br />


        <table width="100%" style="font-family: serif;" cellpadding="3">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            $t = new Grei\TanggalMerah();
            $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            for ($i = 1; $i < $tanggal + 1; $i++) {
                if ($i < 9) {
                    $i = "0" . $i;
                } else {
                    $i;
                }
                $d = $tahun . "-" . $bulan . "-" . $i; ?>
                <tr style="border:1px solid">
                    <td><?= $d ?></td>
                    <?php
                    $dr = $tahun . '-' . $bulan . '-' . $i;
                    $cek = $this->db->get_where($tabel, ['in_date' => $dr, 'id_biodata' => $role_id]);
                    if ($cek->num_rows() > 0) {
                        foreach ($cek->result() as $r) {
                            echo "<td>" . $r->in_time . "</td>";
                            echo "<td>" . $r->out_time . "</td>";
                            echo "<td>" . $r->keterangan . "</td>";
                        }
                    } else {
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                        echo "<td>  </td>";
                    }
                    ?>
                </tr>
            <?php }
            ?>
        </table>
   



</body>
</html>










































