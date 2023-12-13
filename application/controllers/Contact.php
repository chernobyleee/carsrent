<?php
class Contact extends CI_Controller {
    /// contact bisa diakses oleh guest dan user
    public function index(){
        if ($this->session->userdata('username')) {
            $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            $user['user'] = $user;
            $this->load->view('templates/login_header', $user);
        } else {
            $this->load->view('templates/header');
        }
        $this->load->view('contact/index');
        $this->load->view('templates/footer');
    }
    public function inputcontact() {

        $nama = $this->input->post('nama') ? $this->input->post('nama') : null;
        $email = $this->input->post('email') ? $this->input->post('email') : null;
        $subject = $this->input->post('subject') ? $this->input->post('subject') : null;
        $message = $this->input->post('message') ? $this->input->post('message') : null;

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        );

        $this->db->insert('contact', $data);
        $this->session->set_flashdata('success', 'Message sent.');
        redirect('contact');
        
    }


}