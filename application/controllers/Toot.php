<?php

class Toot extends CI_Controller
{
    public function index(Type $var = null)
    {
        $this->load->view("toot/toot");
    }

    public function send()
    {
        $name = $this->input->post("name");
        $date = $this->input->post("date");
        $number = $this->input->post("number");
        $data = $this->input->post("urlImage");
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        // var_dump($data);die();
        $data = base64_decode($data);
        $filename = date('hi') . '.svg';
        if (file_put_contents('assets/' . $filename, $data)) {
            $config = [
                "protocol" => "smtp",
                "smtp_host" => "smtp.gmail.com",
                "smtp_port" => 465,
                "smtp_user" => "dataanalytic.adm@gmail.com",
                "smtp_pass" => "cozppnqisekublge",
                "smtp_crypto" => "ssl",
                "mailtype" => "html",
                "smtp_timeout" => "30",
                // "charset" => "iso-8859-1",
                "charset" => "utf-8",
                "wordwrap" => true,
                "mailpath"  => "/usr/sbin/sendmail",
                "newline"  => "\r\n",
                "crlf"  => "\r\n",
                "from" => "dataanalytic.adm@gmail.com",
                "from_alias" => "DIGI PATROL"
            ];
            $this->load->library('email', $config);
            $to = "depiyawandasep13@gmail.com";
            $this->email->from('dataanalytic.adm@gmail.com', 'DIGI PATROL');
            $this->email->to($to);
            $message = "Name :" . $name . "<br>" . "Date : " . $date  . "<br>" . "number : " . $number . "<br>" . "<h2>IMAGE CLICK URL THIS</h2> : <img src='" . base_url('assets/' . $filename) . "'>";
            // $this->email->attach(base_url('assets/img/bg_2.jpg'));
            $this->email->subject('teS');
            $this->email->message($message);

            if ($this->email->send()) {
                echo "terkirim";
            }
        }

        // if ($urlImage != null) {

        //     if ($this->email->send()) {
        //         echo "terkirim";
        //     }
        // }
    }
}
