<?php

class Pendaftaran extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('Admin');
        $id = $this->session->userdata('id_akun');
        $msrole = $this->session->userdata('controlAkun');
       
    }

    function index()
    {
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
        );

        // echo '<pre>';
        // var_dump($data);
        $this->load->view('template/header',$data);
        $this->load->view('Superadmin/pendaftaran',$data);
        $this->load->view('template/fotter');
    }

    function listareaKerja()
    {
        $areaKerja = $this->input->get('areaKerja');
        $list = $this->Admin->areaKerja($areaKerja);
        echo json_encode($list);
    }

    function akun()
    {
        $role = $this->input->post('role');
        $npk = $this->input->post('npk');
        $id = $role."-".$npk;
        $cekAkun = $this->db->get_where('admisecsgp_msakun', array('id_akun' => $id))->num_rows();
        
        //   insert admisecsgp_msakun
        $data1 = array(
            'id_akun' => $id,
            'npk'  => $this->input->post('npk'),
            'password' => $this->murry->enkrip($npk),
        );
        //   admisec_msrole
        $data2 = array(
            'id_karyawan' => $id,
            'wilayah' => $this->input->post('wilayah'),
            'area_kerja' => $this->input->post('area'),
            'security_operation' => $this->input->post('SecOps'),
            'security_admin' => $this->input->post('SecAdm'),
            'layanan_security' => $this->input->post('LaySec'),
            'security_information' => $this->input->post('SecInfo'),
            'training' => $this->input->post('Training'),
            'asms' => $this->input->post('Asms'),
            'atsg' => $this->input->post('Atsg'),           
            'smp' => $this->input->post('Smp'),           
            'control_database' => $this->input->post('Cd'),           
            'review' => $this->input->post('Review'),           
            'syncronize' => $this->input->post('Syncronize'),           
            'lo_g' => $this->input->post('Log'),           
        );
       
        if($cekAkun != 1){
            $input = $this->db->insert('admisecsgp_msakun', $data1);
            $input = $this->db->insert('admisec_msrole', $data2);
           
            //   insert admmsadmin_profile
            $config['upload_path']="./assets/img/admin"; //path folder file upload
            $config['allowed_types']='jpeg|jpg|png|JPG'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            
            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
                
                $idkaryawan = $id;//id_karyawan
                $nama = strtoupper($this->input->post('namaLengkap')); //nama
                $image= $data['upload_data']['file_name']; //set file name ke variable image
                
                $result= $this->Admin->UploadProfile($idkaryawan,$nama,$image); //kirim value ke model m_upload
                echo 'Sukses';
            }
        }else{
            echo 'Gagal';
        }
        
    }

    function Wilayah(){
        $sql = $this->db->get('admisecmstr_wilayah')->result_array();
        echo json_encode($sql);
    }

    function DaftarArea(){
        $wilayah = $this->input->post('id_wilayah');
        $sql = $this->db->get_where('admisecmstr_wilayah', array('id_wilayah' => $wilayah))->result_array();
        echo json_encode($sql);
    }

    
}

?>