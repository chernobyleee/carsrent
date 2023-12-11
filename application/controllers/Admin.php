<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ModelCars');
        $this->load->model('ModelUser');
    }
    public function index(){
        if ($this->session->userdata('username')) {
            cek_login();
            $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            if ($user['role'] == 1) {
                $data['user'] = $this->ModelUser->getInfo();
                $data['cars'] = $this->ModelCars->getcars();
                $data['message'] = $this->ModelCars->getMessage();
                $data['review'] = $this->ModelCars->getReviewunactive();
                $data['totaluser'] = $this->ModelUser->getTotalUser();
                $data['totalcars'] = $this->ModelUser->getTotalCars();
                $data['totalreview'] = $this->ModelUser->getTotalReview();
                $data['totalcontact'] = $this->ModelUser->getTotalContact();

                $this->load->view('admin/sidebar',$data);                
                $this->load->view('admin/dashboard',$data);
                $this->load->view('admin/content1',$data);
                $this->load->view('admin/content2',$data);
                $this->load->view('admin/content4',$data);
                $this->load->view('admin/footer_admin');
            } else {
                redirect('home');
            }

        } else {
            redirect('home');
        }
        

    }
    public function accReview()
    {
        $id_review = $this->input->post('status') ? $this->input->post('status') : null;
        $this->ModelCars->acceptReview($id_review);
        redirect('admin');
    }
    public function delReview()
    {
        $id_review = $this->input->post('status') ? $this->input->post('status') : null;
        $this->ModelCars->deletereview($id_review);
        redirect('admin');
    }
}