<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ModelUser');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            if ($user['role'] == 1) {
                redirect('admin');
            } else {
                $user['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
                $data['review'] = $this->ModelUser->getReview();
                $data['total'] = $this->ModelUser->getTotal();
                $data['user'] = $this->ModelUser->getInfo();
                $this->load->view('templates/login_header',$user);
                $this->load->view('user/profile', $data);
                $this->load->view('templates/footer');
            }

        } else {
            redirect('autentifikasi');
        }
    }
    public function UbahProfil()
{
    $username = $this->input->post('username');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $nohp = $this->input->post('nohp');
    $gambar = $this->input->post('gambar');
    
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
    if (!empty($gambar)) {
        $dataToUpdate['gambar'] = $gambar;
    }

    // Periksa apakah ada data yang akan diupdate
    if (!empty($dataToUpdate)) {
        $this->db->where('username', $username);
        $this->db->update('user', $dataToUpdate);
    }

    redirect('profil');
}

    
    
}
?>