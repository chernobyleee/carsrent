<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ModelUser');
        $this->load->model('ModelCars');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            $user['user'] = $user;
            $data['review'] = $this->ModelUser->getReview();
            $data['total'] = $this->ModelUser->getTotal();
            $data['user'] = $this->ModelUser->getInfo();
            $this->load->view('templates/login_header', $user);
            $this->load->view('user/profile', $data);
            $this->load->view('admin/footer_admin');
        } else {
            redirect('autentifikasi');
        }
    }
    public function UbahProfil()
    {
        $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');

        // Pastikan semua data yang diterima tidak null sebelum diupdate
        $dataToUpdate = array();
        if (!empty($nama)) {
            $dataToUpdate['nama'] = $nama;
        }
        if (!empty($email)) {
            $dataToUpdate['email'] = $email;
        }
        if (!empty($nohp)) {
            $dataToUpdate['nohp'] = $nohp;
        }
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/img/profil/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '8192000';
            $config['max_width'] = '4096';
            $config['max_height'] = '4096';
            $config['file_name'] = 'pro' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $gambar_lama = $user['gambar'];
                if ($gambar_lama != 'defaults.png') {
                    unlink(FCPATH . './assets/img/profil/' . $gambar_lama);
                }
                $gambar_baru = $this->upload->data('file_name');
                $dataToUpdate['gambar'] = $gambar_baru;
            } else {
                $upload_error = $this->upload->display_errors();
                echo $upload_error;
            }
        }

        // Periksa apakah ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            $this->db->where('username', $username);
            $this->db->update('user', $dataToUpdate);
        }

        redirect('profil');
    }
    public function EditReview()
    {
        $reviewmodal = $this->input->post('reviewmodal');
        $rating = $this->input->post('rating');
        $review = $this->input->post('review');


        // Pastikan semua data yang diterima tidak null sebelum diupdate
        $dataToUpdate = array();
        if (!empty($review)) {
            $dataToUpdate['massage'] = $review;
            $dataToUpdate['is_active'] = 0;
            $dataToUpdate['rating'] = $rating;
        }
        // Periksa apakah ada data yang akan diupdate
        if (!empty($dataToUpdate)) {
            $this->db->where('massage', $reviewmodal);
            $this->db->update('review', $dataToUpdate);
        }
        redirect('profil');
    }
    public function delReview()
    {
        $id_review = $this->input->post('id_review');
        $this->ModelCars->deleteReview($id_review);
        redirect('profil');
    }
}
