<?php 
	class home extends My_Controller{
		public function index(){
			$this->load->view('common/header');
			$this->load->view('index');
			$this->load->view('common/footer');
		}
	}
?>