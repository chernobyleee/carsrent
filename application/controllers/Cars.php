<?php

class Cars extends CI_Controller
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
            $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
            $user['user'] = $user;
            $data['cars'] = $this->ModelCars->getcars('tipe.id_tipe');
            $data['tipe'] = $this->ModelCars->getTipe();
            $data['ratings'] = $this->ModelCars->getallratings();
            $this->load->view('templates/login_header', $user);
            $this->load->view('cars/index', $data);
            $this->load->view('cars/modallogin');
            $this->load->view('templates/footer');
        } else {
            $data['cars'] = $this->ModelCars->getcars('tipe.id_tipe');
            $data['tipe'] = $this->ModelCars->getTipe();
            $data['ratings'] = $this->ModelCars->getallratings();
            $this->load->view('templates/header');
            $this->load->view('cars/index', $data);
            $this->load->view('cars/modalnotlogin');
            $this->load->view('templates/footer');
        }
        
        
    }
    public function inputreview()
    {
        $this->load->database();
        
        $id_user = $this->ModelUser->getinfo();
        $id_mobil = $this->input->post('id_modal') ? $this->input->post('id_modal') : null;
        $review = $this->input->post('review') ? $this->input->post('review') : '        ';
        $rating = $this->input->post('rating') ? $this->input->post('rating') : 0;

        $data = array(
            'id_user' => $id_user[0]['id_user'],
            'id' => $id_mobil,
            'rating' => $rating,
            'massage' => $review
        );

        $this->db->insert('review', $data);
        
        redirect('cars');
    }
    public function hapusreview() /// buat admin dan user
    {
        $id_review = $this->input->post('id_review');


    }


    ////////// buat admin, mungkin nanti bakal dipindah ////////////
    
}


?>
<!--
    DELETE FROM `user` WHERE `user`.`id_user` = 3;
    DELETE FROM `user` WHERE `user`.`id_user` = 4;
    DELETE FROM `user` WHERE `user`.`id_user` = 5;
    DELETE FROM `user` WHERE `user`.`id_user` = 6;

    $id_user = $_POST['nama'] ?? null;
    $id_mobil = $_POST['id_modal'] ?? null;
    $review =  $_POST['review'] ?? null;
    $rating =  $_POST['rating'] ?? null;
    $submit = "INSERT INTO review (id_user,id,rating,massage)  VALUES ('$id_user','$id_mobil','$rating','$review')";
    mysqli_query($conn, $submit)

        ?>
-->