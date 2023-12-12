<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCars extends CI_Model 
{
    public function getReview() 
    {
        $this->db->select('id_review, is_active, tipe.nama as tipe, user.username as username, user.gambar as gambar, mobil.nama as nama, review.massage, review.rating');
        $this->db->from('review');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('mobil', 'mobil.id = review.id');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->order_by('id_review','desc');
    
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCars($sort)
    {
        $this->db->select('tipe.nama as tipe, mobil.id as id, mobil.nama, transmisi, tahun, warna, kursi, harga, gambar');
        $this->db->from('mobil');
        $this->db->join('tipe',' tipe.id_tipe = mobil.id_tipe');
        $this->db->order_by($sort,'desc');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function getTipe()
    {
        $this->db->select("id_tipe, nama as tipe");
        $this->db->from('tipe');
        $query = $this->db->get();
        return $query->result();
    }
    public function getMessage()
    {
        $this->db->select("id_contact, nama, email, subject, message");
        $this->db->from('contact');
        $this->db->order_by('id_contact','desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function deleteReview($id_review) {
        // Assuming your primary key is 'id', adjust it based on your table structure
        $this->db->where('id_review', $id_review);
        $this->db->delete('review');
    }
    public function deleteContact($id_contact) {
        // Assuming your primary key is 'id', adjust it based on your table structure
        $this->db->where('id_contact', $id_contact);
        $this->db->delete('contact');
    }
    public function deletemobil($id_mobil) {
        // Assuming your primary key is 'id', adjust it based on your table structure
        $this->db->where('id', $id_mobil);
        $this->db->delete('mobil');
    }
    public function acceptReview($id_review)
    {
        $this->db->where('id_review = ',$id_review);
        $this->db->update("review", array('is_active' => 1));
        
    }
    public function getallratings(){
        $this->db->select('mobil.id ,mobil.nama,review.id,review.rating,review.is_active');
        $this->db->from('review');
        $this->db->join('mobil','mobil.id = review.id');
        $this->db->order_by('mobil.id','asc');

        $query = $this -> db -> get();
        return $query->result_array();
    }
}
?>
