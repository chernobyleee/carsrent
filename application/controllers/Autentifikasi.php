<?php
class Autentifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('autentifikasi/login');
    }
    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect('home');
        }

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Username Harus diisi!!',
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Harus diisi'
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('autentifikasi/login');
        } else {
            $this->_login();
        }
    }
    public function register()
    {
        if ($this->session->userdata('username')) {
            redirect('home/index');
        } else {
            $this->load->view('autentifikasi/registrasi');
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required|trim|is_unique[user.username]',
                [
                    'required' => 'Username Belum diisi!!',
                    'is_unique' => 'Username Sudah Terdaftar!'
                ]
            );
        }
    }
    // ini sementara langsung ke form login password_hash('password', PASSWORD_DEFAULT)
    private function _login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['username' => $username])->row_array();
        //jika usernya ada
        if ($user) {
            //jika user sudah aktif
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],

                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 1) {
                    redirect('admin');
                } else {

                    redirect('home/index');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div 
class="alert alert-danger alert-message" role="alert">Password 
salah!!</div>');
                redirect('autentifikasi');
            }

            $this->session->set_flashdata('pesan', '<div 
class="alert alert-danger alert-message" role="alert">User belum 
diaktifasi!!</div>');
            redirect('autentifikasi');
        } else {
            $this->session->set_flashdata('pesan', '<div 
class="alert alert-danger alert-message" role="alert">Akun tidak 
terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }
    //// controller dibawah untuk view dan input. yg diatas rencananya buat cek login


    public function inputRegister()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]',
            [
                'required' => 'Username Belum diisi!!',
                'is_unique' => 'Username Sudah Terdaftar!'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Belum diis!!'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Masukan Email',
            'required',
            [
                'required' => 'Email Belum diis!!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Masukan password',
            'required',
            [
                'required' => 'password Belum diis!!'
            ]
        );
        $this->form_validation->set_rules(
            'nohp',
            'Masukan nohp',
            'required',
            [
                'required' => 'nohp Belum diis!!'
            ]
        );
        if ($this->form_validation->run() == false) {

            $this->load->view('autentifikasi/registrasi');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $nohp = $this->input->post('nohp');

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'nohp' => $nohp
            );

            $this->db->insert('user', $data);
            redirect('autentifikasi');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!</div>');
        redirect('autentifikasi');
    }
}
