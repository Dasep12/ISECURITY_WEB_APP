<style>
    .detailss li {
        font-size: 13px;
    }

    .detailss h6 {
        font-weight: bold;
    }

    #detailInfo {
        font-weight: bold;
        font-style: italic;
    }
</style>
<!-- <table class="table">
    <thead>
        <tr>
            <th>Plant</th>
            <th>Tanggal</th>
            <th>Shift</th>
            <th>Vehicle</th>
            <th>People</th>
            <th>Document</th>
        </tr>
    <tbody>
        <?php foreach ($area->result() as $ar) : ?>
            <tr>
                <td><?= $ar->area ?></td>
                <td><?= $ar->tanggal ?></td>
                <td><span style="cursor:pointer" data-id="<?= $ar->id_trans  ?>" data-shift="<?= $ar->shift  ?>" data-tanggal="<?= $ar->tanggal  ?>" class="badge badge-danger badgeShift"><?= $ar->shift ?></span> </td>
                <td><?= $ar->total_vehicle ?></td>
                <td><?= $ar->total_people ?></td>
                <td><?= $ar->total_document ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </thead>
</table> -->

<p>
    <?= strtoupper("Laporan Akhir Shift " . date('d F Y', strtotime($date))) ?>
</p>
<p><?= strtoupper("Area " . $area->row()->area) ?></p>
<?php foreach ($area->result() as $ar) :
    $people = $this->M_soa->detail_people($ar->id_trans);
    $vehicle = $this->M_soa->detail_vehicle($ar->id_trans);
    $document = $this->M_soa->detail_material($ar->id_trans);
?>
    <div class="row">
        <div class="col-lg-12">
            <h6>Shift <?= $ar->shift  ?></h6>
        </div>
        <div class="col-lg-4 detailss">
            <h6>People</h6>
            <ol style="list-style-type: square">
                <?php foreach ($people->result() as $p) : ?>
                    <li><?= $p->title . ' : ' .  $p->totals ?></li>
                <?php endforeach ?>
            </ol>
        </div>
        <div class="col-lg-4 detailss">
            <h6>Vehicle</h6>
            <ol style="list-style-type: square">
                <?php foreach ($vehicle->result() as $v) : ?>
                    <li><?= $v->title . ' : ' .  $v->totals ?></li>
                <?php endforeach ?>
            </ol>
        </div>
        <div class="col-lg-4 detailss">
            <h6>Document</h6>
            <ol style="list-style-type: square">
                <?php foreach ($document->result() as $d) : ?>
                    <li><?= $d->title . ' : ' .  $d->totals ?></li>
                <?php endforeach ?>
            </ol>
        </div>
    </div>
    <hr>
<?php endforeach ?>