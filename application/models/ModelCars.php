<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCars extends CI_Model 
{
    public function getReview() 
    {
        $this->db->select('tipe.nama as tipe, user.username as username, mobil.nama as nama, mobil.gambar as gambar, review.massage, review.rating');
        $this->db->from('review');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('mobil', 'mobil.id = review.id');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->where('is_active = 1');
        $this->db->order_by('id_review','desc');
    
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getReviewunactive() 
    {
        $this->db->select('id_review, tipe.nama as tipe, user.username as username, mobil.nama as nama, mobil.gambar as gambar, review.massage, review.rating');
        $this->db->from('review');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('mobil', 'mobil.id = review.id');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->where('is_active = 0');
        $this->db->order_by('id_review','asc');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getCars()
    {
        $this->db->select('tipe.nama as tipe, mobil.id as id, mobil.nama, transmisi, tahun, warna, kursi, harga, gambar');
        $this->db->from('mobil');
        $this->db->join('tipe',' tipe.id_tipe = mobil.id_tipe');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function getTipe()
    {
        $this->db->select("nama as tipe");
        $this->db->from('tipe');
        $query = $this->db->get();
        return $query->result();
    }
    public function getMessage()
    {
        $this->db->select("nama, email, subject, message");
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
    public function acceptReview($id_review)
    {
        $this->db->where('id_review = ',$id_review);
        $this->db->update("review", array('is_active' => 1));
        
    }
}
?>
