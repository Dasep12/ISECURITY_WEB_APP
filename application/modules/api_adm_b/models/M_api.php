<?php

class M_api extends CI_Model
{

    //cek login
    public function Login($npk, $password)
    {
        $query  = $this->db->query("
        SELECT u.name , u.npk , u.admisecsgp_mstplant_plant_id as plant_id , p.plant_name 
         FROM admisecsgp_mstusr  u, admisecsgp_mstplant p
        WHERE u.admisecsgp_mstplant_plant_id = p.plant_id 
        AND u.npk = '" . $npk . "' 
        AND u.password = '" . $password . "'");
        return $query;
    }


    //show jadwal patroli untuk dashboard 
    // perubahan 09/08/22
    public function showJadwalPatroliAnggota($idUser, $plant_id, $today)
    {
        $query = $this->db->query("SELECT jp.id_jadwal_patroli , jp.date_patroli AS tanggal , usr.name AS nama , usr.npk  , 
        sh.nama_shift  AS shift , jp.admisecsgp_mstshift_shift_id AS id_shift ,sh.jam_masuk  ,  sh.jam_pulang
        FROM admisecsgp_trans_jadwal_patroli jp , admisecsgp_mstusr usr , admisecsgp_mstshift sh , admisecsgp_mstplant pl
        WHERE 
        jp.admisecsgp_mstplant_plant_id = '" . $plant_id .  "' AND
        jp.admisecsgp_mstshift_shift_id = sh.shift_id AND 
        usr.npk = jp.admisecsgp_mstusr_npk AND 
        jp.status = 1 AND 
        usr.npk = '" . $idUser .  "' AND 
        pl.plant_id = '" . $plant_id .  "' AND
        jp.date_patroli = '" . $today .  "'  ");
        return $query;
    }



    //tampilkan zona yang harus di patroli 
    //perubahan 09/08/22
    public function ambilZonadiJadwal($idplant, $tanggal, $shift_id)
    {

        $query  = $this->db->query("SELECT zn.zone_id AS zona_id ,  spt.date_patroli,pl.plant_name AS plant , zn.zone_name  , sh.nama_shift  AS shift , 
        spt.admisecsgp_mstshift_shift_id AS shift_id , 
        -- IF(spt.status_zona = 0 , 'OFF' ,'ON') AS zona_status , spt.status_zona , 
        prd.name AS stat_produksi , spt.status 
        FROM admisecsgp_trans_zona_patroli spt , admisecsgp_mstzone zn , admisecsgp_mstshift sh , admisecsgp_mstproduction prd ,
        admisecsgp_mstplant pl 
        WHERE spt.admisecsgp_mstzone_zone_id = zn.zone_id AND spt.admisecsgp_mstplant_plant_id = pl.plant_id  AND sh.shift_id = spt.admisecsgp_mstshift_shift_id 
        AND spt.date_patroli = '" . $tanggal . "'  AND spt.admisecsgp_mstplant_plant_id = '" . $idplant . "'
        AND prd.produksi_id = spt.admisecsgp_mstproduction_produksi_id  AND  spt.status_zona = 1  AND 
        spt.admisecsgp_mstshift_shift_id = '" . $shift_id . "' AND spt.status = 1  ");
        return $query;
    }

    public function ambilCheckPoint($zone)
    {
        $query = $this->db->query("SELECT id  , check_name , check_no as no_nfc , IF(status=1,'AKTIF' , 'INACTIVE') as status_checkpoint from admisecsgp_mstckp where status=1 and admisecsgp_mstzone_id ='" . $zone . "' ");
        return $query;
    }

    public function ambilObjek($check)
    {
        $query = $this->db->query('select id , nama_objek , status  from admisecsgp_mstobj where status="1" and admisecsgp_mstckp_id  ="' . $check . '" ');
        return $query;
    }

    public function ambilEvent($objek)
    {
        $query = $this->db->query("SELECT ed.id  , ed.admisecsgp_mstevent_id as event_id , e.event_name  from admisecsgp_msteventdtls ed ,  admisecsgp_mstevent e , admisecsgp_mstobj o where ed.admisecsgp_mstobj_id = '" . $objek . "' and ed.admisecsgp_mstobj_id = o.id and ed.admisecsgp_mstevent_id = e.id and ed.status = 1 ");
        return $query;
    }


    // checkpoint for offline storage
    //tampilkan checkPoint()
    public function Checkpoint($id, $date, $shift_id)
    {
        $query =  $this->db->query("SELECT ckp.checkpoint_id ,  ckp.check_no , ckp.check_name , ckp.check_no AS no_nfc , ckp.admisecsgp_mstzone_zone_id AS id_zona
        FROM admisecsgp_trans_zona_patroli znp
        LEFT JOIN admisecsgp_mstzone zn ON znp.admisecsgp_mstzone_zone_id = zn.zone_id 
        LEFT JOIN admisecsgp_mstckp  ckp ON ckp.admisecsgp_mstzone_zone_id = zn.zone_id 
        AND ckp.admisecsgp_mstzone_zone_id = znp.admisecsgp_mstzone_zone_id
        WHERE 
        znp.status = 1 AND 
        znp.status_zona = 1 AND 
        ckp.status = 1 AND
        znp.admisecsgp_mstshift_shift_id = '" . $shift_id . "' AND
        znp.date_patroli = '" . $date . "'  AND 
        znp.admisecsgp_mstplant_plant_id = '" . $id . "' ");
        return $query;
    }


    //tampilkan data objek
    public function Object($id)
    {

        $query =  $this->db->query("SELECT  ob.objek_id , ob.nama_objek , ob.admisecsgp_mstckp_checkpoint_id AS id_checkpoint  ,
        (SELECT COUNT(1) FROM admisecsgp_trans_details 
                    WHERE status_temuan = 0 AND admisecsgp_mstobj_objek_id = ob.objek_id 
                ) AS temuan_status 
        
        FROM  admisecsgp_mstobj  ob 
        LEFT JOIN admisecsgp_mstckp ck ON  ob.admisecsgp_mstckp_checkpoint_id = ck.checkpoint_id 
        LEFT JOIN admisecsgp_mstzone zn  ON ck.admisecsgp_mstzone_zone_id = zn.zone_id 
        LEFT JOIN admisecsgp_mstplant pl ON  zn.admisecsgp_mstplant_plant_id = pl.plant_id
        LEFT JOIN admisecsgp_trans_details dtls ON dtls.admisecsgp_mstobj_objek_id = ob.objek_id
        WHERE pl.plant_id = '" . $id . "'  AND
         ck.status  = 1 AND 
        ob.status = 1 AND 
        zn.status = 1 AND 
        pl.status = 1 
            GROUP BY ob.objek_id ,ob.nama_objek ,ob.admisecsgp_mstckp_checkpoint_id 
            ORDER BY temuan_status DESC
         ");
        return $query;
    }

    //tampilkan event
    public function Event($id)
    {
        $query = $this->db->query("SELECT ob.objek_id as id_objek , ob.nama_objek   ,ev.event_name  , ev.event_id as id_event , kobj.kategori_name  ,
        kobj.kategori_id  as id_kategori
          FROM admisecsgp_mstevent ev 
          LEFT JOIN admisecsgp_mstkobj kobj ON kobj.kategori_id  = ev.admisecsgp_mstkobj_kategori_id 
          LEFT JOIN admisecsgp_mstobj ob ON ob.admisecsgp_mstkobj_kategori_id  = kobj.kategori_id 
          LEFT JOIN admisecsgp_mstckp ckp ON ckp.checkpoint_id  = ob.admisecsgp_mstckp_checkpoint_id 
          LEFT JOIN admisecsgp_mstzone zn ON zn.zone_id  = ckp.admisecsgp_mstzone_zone_id 
          LEFT JOIN admisecsgp_mstplant pl ON pl.plant_id  = zn.admisecsgp_mstplant_plant_id 
        WHERE 
         pl.plant_id  = '" . $id . "'  AND 
         ev.status  = 1 
         ORDER BY ob.nama_objek  ASC
          ");
        return $query;
    }
    //


    // show temuan di checkpoint 
    public function showTemuan($plant_id, $zona_id)
    {
        $query = $this->db->query("SELECT hds.trans_header_id  as id , hds.date_patroli AS tanggal , zn.zone_name AS zona , ck.check_name  ,
        ob.nama_objek AS objek ,
        ev.event_name AS event , dtl.image_1 , dtl.image_2 , dtl.image_3 , dtl.description
        FROM admisecsgp_trans_headers hds , admisecsgp_trans_details dtl ,
        admisecsgp_mstplant pl , admisecsgp_mstzone zn , admisecsgp_mstckp ck , admisecsgp_mstobj ob ,
        admisecsgp_mstevent ev
        WHERE
        hds.trans_header_id  = dtl.admisecsgp_trans_headers_trans_headers_id  
        AND dtl.status_temuan = 0 
        -- AND dtl.laporkan_pic  = 1 
        AND hds.admisecsgp_mstzone_zone_id  = zn.zone_id 
        AND zn.admisecsgp_mstplant_plant_id = pl.plant_id 
        AND hds.admisecsgp_mstckp_checkpoint_id  = ck.checkpoint_id
        AND pl.plant_id = '" . $plant_id . "' 
        AND hds.admisecsgp_mstzone_zone_id = '" . $zona_id . "' 
        AND dtl.admisecsgp_mstobj_objek_id  = ob.objek_id 
        AND ev.admisecsgp_mstkobj_kategori_id  = ob.admisecsgp_mstkobj_kategori_id 
        AND ev.event_id = dtl.admisecsgp_mstevent_event_id 
        ");
        return $query;
    }
    // 

    // show persentasi patroli di mobile apps
    public function showPersentase($plant_id, $date, $shift_id, $user_id, $tipe_patrol)
    {
        if ($tipe_patrol == 1) {
            $tipe = 1;
        } else {
            $tipe = 2;
        }

        $query = $this->db->query("
            SELECT count(1) total_ckp_f, tp.total_ckp_p, (count(1) * 100 / tp.total_ckp_p ) persentase
                from admisecsgp_trans_headers ath
                inner join (
                    select count(sckp.checkpoint_id) total_ckp_p, szn.date_patroli, szn.admisecsgp_mstshift_shift_id, 
                        szn.admisecsgp_mstplant_plant_id 
                        from admisecsgp_trans_zona_patroli szn 
                        inner join admisecsgp_mstckp sckp on szn.admisecsgp_mstzone_zone_id=sckp.admisecsgp_mstzone_zone_id
                    where szn.status=1 and szn.status_zona=1 and sckp.status=1
                    group by szn.date_patroli, szn.admisecsgp_mstshift_shift_id, szn.admisecsgp_mstplant_plant_id
                ) tp on tp.date_patroli=ath.date_patroli and tp.admisecsgp_mstshift_shift_id=ath.admisecsgp_mstshift_shift_id 
            where ath.date_patroli='$date' and ath.admisecsgp_mstshift_shift_id='$shift_id' 
                and tp.admisecsgp_mstplant_plant_id='$plant_id' and ath.type_patrol=$tipe_patrol
            group by tp.total_ckp_p
        ");

        return $query;
    }

    public function getSetting($code)
    {
        $query = $this->db->query("
            SELECT nilai_setting, type, unit
            FROM admisecsgp_setting 
            WHERE nama_setting='$code'
        ");
        return $query;
    }

    public function sendEmail($data)
    {
        // st.nilai_setting, st.type, st.unit, 
        $query = $this->db->query("
            SELECT pl.plant_name, mg.email, st.nilai_setting, st.type, st.unit, eo.event_name, eo.kategori_name, cz.zone_name, cz.check_name
            FROM admisecsgp_mstplant pl
                INNER JOIN admisecsgp_mstusr_ga mg ON mg.admisecsgp_mstplant_plant_id=pl.plant_id
                JOIN (
                    select sst.nama_setting, sst.nilai_setting, sst.type, sst.unit
                    from admisecsgp_setting sst
                    group by sst.nama_setting, sst.nilai_setting, sst.type, sst.unit
                ) st ON st.nama_setting='email_config'
                JOIN (
                    select sev.event_id, sev.event_name, sob.kategori_name
                        from admisecsgp_mstevent sev
                        inner join admisecsgp_mstkobj sob on sob.kategori_id=sev.admisecsgp_mstkobj_kategori_id
                    group by sev.event_id, sev.event_name, sob.kategori_name
                ) eo ON eo.event_id='".$data['event_id']."'
                JOIN (
                    select sck.checkpoint_id, sck.check_name, szo.zone_name
                        from admisecsgp_mstckp sck
                        inner join admisecsgp_mstzone szo on szo.zone_id=sck.admisecsgp_mstzone_zone_id
                    group by sck.checkpoint_id, sck.check_name, szo.zone_name
                ) cz ON cz.checkpoint_id='".$data['chekpoint_id']."'
            WHERE pl.plant_id='".$data['plant_id']."'
        ");

        return $query;
    }
}
