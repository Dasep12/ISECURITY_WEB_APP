<?php

class M_soa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->srsdb = $this->load->database('srs_bi', TRUE);
    }

    public function area()
    {
        $wil = user_wilayah();
        $npk = user_npk();

        $q = "SELECT id, title FROM admiseciso_area_sub WHERE area_categ_id='1' AND status=1";
        
        if(is_author('ALLAREA'))
        {
            $q .= " AND wil_id='$wil'";
        } 
        $resq = $this->srsdb->query($q);

        return $resq;
    }

}