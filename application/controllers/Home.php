<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ModelCars');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            $user['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/login_header', $user);
        } else {
            $this->load->view('templates/header');
        }
        $data['review'] = $this->ModelCars->getReview();

        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}