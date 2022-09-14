<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct() ;
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['title'] = 'Menu' ;
		$data['tableau'] = $this->selectAll() ;
		$this->load->view('templates/header',$data) ;
		$this->load->view('pages/menu',$data);
		$this->load->view('templates/footer');
	}

	public function truncateTable()
	{
		$this->load->database() ;
		$this->db->empty_table('menu');
		$data['title'] = 'Menu' ;
        $data['tableau'] = $this->selectAll() ;
		$this->load->view('templates/header',$data) ;
		$this->load->view('pages/menu',$data);
		$this->load->view('templates/footer') ;
	}

	public function supprimer()
	{
		$this->load->database() ;
		$id = $this->input->post('idvaleur') ;
		// var_dump($id) ;
		$this->db->where('idMenu', $id) ;
		$this->db->delete('menu') ;


		redirect('menu/index') ;
		// $data['title'] = 'Menu' ;
        // $data['tableau'] = $this->selectAll() ;
		// $this->load->view('templates/header',$data) ;
		// $this->load->view('pages/menu',$data) ;
		// $this->load->view('templates/footer') ;
		// echo 'deleted' ;
	}

	public function modifier()
	{
		$this->load->database() ;
		$id = $this->input->post('idProduit') ;
		$nom = $this->input->post('nomProduit') ;
		$prix = $this->input->post('prixProduit') ;
		$this->db->set('nomMenu', $nom) ;
		$this->db->set('prixMenu', $prix) ;
		$this->db->where('idMenu', $id) ;
		$this->db->update('menu') ;
		redirect('menu/index') ;
	}

	public function register()
	{
		// Code ...
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('nomMenu', 'Nom du Menu:', 'required|max_length[40]');
		$this->form_validation->set_rules('prixMenu', 'Prix du Menu:', 'required|greater_than[999]');


		if ($this->form_validation->run() == TRUE)
        {
            // Atsofoka any anaty base de donnees
            $this->load->database() ;
            $datas = array(
		        'nomMenu' => $this->input->post('nomMenu'),
		        'prixMenu' => floatval($this->input->post('prixMenu'))
			);

			$this->db->insert('menu', $datas);
        }



        $data['title'] = 'Menu' ;
        $data['tableau'] = $this->selectAll() ;
		$this->load->view('templates/header',$data) ;
		$this->load->view('pages/menu',$data);
		$this->load->view('templates/footer') ;

	}
	public function selectAll()
	{
		$this->load->database() ;
		$data = $query = $this->db->get('menu');
		return $data->result() ;
	}

	
}
