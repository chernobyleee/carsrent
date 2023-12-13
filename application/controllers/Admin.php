<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelCars');
        $this->load->model('ModelUser');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            cek_login();
            $cek = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            if ($cek['role'] == 1) {
                $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
                $data['user'] = $user;
                $data['cars'] = $this->ModelCars->getcars('mobil.id');
                $data['tipe'] = $this->ModelCars->getTipe();
                $data['message'] = $this->ModelCars->getMessage();
                $data['review'] = $this->ModelCars->getReview();
                $data['totaluser'] = $this->ModelUser->getTotalUser();
                $data['totalcars'] = $this->ModelUser->getTotalCars();
                $data['totalreview'] = $this->ModelUser->getTotalReview();
                $data['totalcontact'] = $this->ModelUser->getTotalContact();

                $this->load->view('admin/sidebar', $data);
                $this->load->view('admin/dashboard', $data);
                $this->load->view('admin/content1', $data);
                $this->load->view('admin/content2', $data);
                $this->load->view('admin/content3', $data);
                $this->load->view('admin/content4', $data);
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
        redirect('admin#accreview');
    }
    public function delReview()
    {
        $id_review = $this->input->post('status') ? $this->input->post('status') : null;
        $this->ModelCars->deleteReview($id_review);
        redirect('admin#accreview');
    }
    public function delContact()
    {
        $id_contact = $this->input->post('id_contact') ? $this->input->post('id_contact') : null;
        $this->ModelCars->deleteContact($id_contact);
        redirect('admin#massage');
    }
    public function delMobil()
    {
        $id_mobil = $this->input->post('id_mobil') ? $this->input->post('id_mobil') : null;
        $this->ModelCars->deleteMobil($id_mobil);
        redirect('admin#hapusdata');
    }


    public function tambahmobil()
    {
        $nama = $this->input->post('nama') ? $this->input->post('nama') : null;
        $id_tipe = $this->input->post('id_tipe') ? $this->input->post('id_tipe') : null;
        $transmisi = $this->input->post('transmisi') ? $this->input->post('transmisi') : null;
        $tahun = $this->input->post('tahun') ? $this->input->post('tahun') : null;
        $warna = $this->input->post('warna') ? $this->input->post('warna') : null;
        $kursi = $this->input->post('kursi') ? $this->input->post('kursi') : null;
        $harga = $this->input->post('harga') ? $this->input->post('harga') : null;
        $gambar = $this->input->post('gambar') ? $this->input->post('gambar') : null;

        $dataToUpdate = array();
        if (!empty($nama)) {
            $dataToUpdate['nama'] = $nama;
        }
        if (!empty($id_tipe)) {
            $dataToUpdate['id_tipe'] = $id_tipe;
        }
        if (!empty($transmisi)) {
            $dataToUpdate['transmisi'] = $transmisi;
        }
        if (!empty($tahun)) {
            $dataToUpdate['tahun'] = $tahun;
        }
        if (!empty($warna)) {
            $dataToUpdate['warna'] = $warna;
        }
        if (!empty($kursi)) {
            $dataToUpdate['kursi'] = $kursi;
        }
        if (!empty($harga)) {
            $dataToUpdate['harga'] = $harga;
        }
        
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/img/cars/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '8192000';
            $config['max_width'] = '4096';
            $config['max_height'] = '4096';
            $config['file_name'] = $nama . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $gambar_baru = $this->upload->data('file_name');
                $dataToUpdate['gambar'] = $gambar_baru;
            } else {
                $upload_error = $this->upload->display_errors();
                echo $upload_error;
            }
        
        }
        else{
            
        }
        if (!empty($dataToUpdate)) {
            $this->db->insert('mobil', $dataToUpdate);
        }

        redirect('admin/#tambahdata');
    }
}