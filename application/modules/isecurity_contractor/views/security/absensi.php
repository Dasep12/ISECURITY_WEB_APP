<div class="row">
    <div class="col-12 mt-3">
    </div>
</div>
<div class="table-responsive mt-3">
        <table class="table table-small table-striped small">
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
                <tr>
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
    </div>