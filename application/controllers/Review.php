<?php
class Review extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('ModelCars');
    }
    public function index() {
        if ($this->session->userdata('username')) {
            $user['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/login_header',$user);
        } else {
            $this->load->view('templates/header');
        }

        $data['review'] = $this->ModelCars->getReview();
        $data['tipe'] = $this->ModelCars->getTipe();
    

        $this->load->view('review/index', $data);
        $this->load->view('templates/footer');
    }
    
}


     
