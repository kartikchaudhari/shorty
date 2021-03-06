<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Go extends My_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('string');
	}


	public function index()
	{
		if (!$this->uri->segment(1)) {
			return redirect (base_url());
		}	
		else{
			$url_code=$this->uri->segment(1);
			$this->load->model('urls_model');
			$query=$this->urls_model->fetch_url($url_code);

			if ($query->num_rows()==1) {
				foreach ($query->result() as $row) {
					$url_address=$row->url_address;
				}
				return redirect(prep_url($url_address));
			}
			else{
				$page_data=array('success_fail'=>null,'encoded_url'=>false);

				$this->load->view('common/header');
				$this->load->view('nav/top_nav');
				$this->load->view('create/create',$page_data);
				$this->load->view('common/footer');
			}
		}
	}



}

/* End of file go.php */
/* Location: ./application/controllers/go.php */