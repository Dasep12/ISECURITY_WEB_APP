<?php

class Review_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->iremake = $this->load->database('iremake', TRUE);
    }
}
?>