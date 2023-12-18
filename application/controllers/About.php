<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            $user['user'] = $user;
            $this->load->view('templates/login_header', $user);
        } else {
            $this->load->view('templates/header');
        }
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    }
}
